var BSCGC = (function() {
    //var domElement = null;
    
    /*function init (domElement) {
        this.domElement = domElement;
        //alert("Hei "+domElement);
        load();
    }*/
    
    function load() {
        //Load google API
        google.setOnLoadCallback(googleLoadCallback);
        google.load("gdata", "1");
    }

    function googleLoadCallback() {
        //Load calendar data
        var calendarService = new google.gdata.calendar.CalendarService('GoogleInc-jsguide-1.0');
        var feedUri = 'http://www.google.com/calendar/feeds/8ssvs1of1tf7mlie91q96og5l0%40group.calendar.google.com/public/full-noattendees?futureevents=true&orderby=starttimei&sortorder=ascending';
        calendarService.getEventsFeed(feedUri, drawCalCallback, drawCalHandleError);
    }
    
    var findFirstUrl = function(textString) {
        var textArray = textString.split(' ');
        var urlRegExp = new RegExp('(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?');
        for (var i = 0; i < textArray.length; i++) {
            var txt = textArray[i];
            if (urlRegExp.test(textArray[i])) {
                return textArray[i];
            }
        }
        return '';
    }
    
    var findFirstTime = function(whenList) {
        var whenItem;
        var whenItemStartTime;
        if (!whenList || whenList.length < 1) {
            return null;
        }
        var firstItem = whenList[0];
        var firstItemStartTime = firstItem.getStartTime().getDate();
        for (var i = 1; i < whenList.length; i++) {
            whenItem = whenList[i];
            whenItemStartTime = whenItem.getStartTime().getDate();
            if (whenItemStartTime < firstItemStartTime) {
                firstItem = whenItem;
                firstItemStartTime = whenItemStartTime;
            }
        }
        return firstItem;
    }
    
    var compareEvents = function(a, b) {
        if (a.getStartDate() < b.getStartDate()) {
            return - 1;
        }
        if (a.getStartDate() > b.getStartDate()) {
            return 1;
        }
        return 0;
    }
    
    var calendarEventItem = function(whenObject, title, url, googleUrl, repeating) {
        this.whenObject = whenObject;
        this.title = title;
        this.url = url;
        this.googleUrl = googleUrl;
        this.repeating = repeating;
        this.getStartDate = function() {
            return this.whenObject.getStartTime().getDate();
        }
        this.getEndDate = function() {
            return this.whenObject.getEndTime().getDate();
        }
        this.padMinutes = function(minutes) {
            var minString = '' + minutes;
            while (minString.length < 2) {
                minString = '0' + minString;
            }
            return minString;
        }
        this.getLength = function(language) {
            var millisec = this.whenObject.getEndTime().getDate() - this.whenObject.getStartTime().getDate();
            var minutes = millisec / 1000 / 60;
            var hours = Math.floor(minutes / 60);
            var days = Math.round(minutes / 60 / 24);
            var weeks = Math.round(minutes / 60 / 24 / 7);
            if (weeks > 0) {
                if (language && language == 'en') {
                    if (weeks > 1) {
                        return weeks + ' weeks';
                    }
                    return weeks + ' week';
                }
                if (weeks > 1) {
                    return weeks + ' uker';
                }
                return weeks + ' uke';
            } else if (days > 0) {
                if (language && language == 'en') {
                    if (days > 1) {
                        return days + ' days';
                    }
                    return days + ' day';
                }
                if (days > 1) {
                    return days + ' dager';
                }
                return days + ' dag';
            } else if (hours > 0) {
                minutes = minutes - (hours * 60);
                return hours + ':' + this.padMinutes(minutes);
            } else if (minutes > 0) {
                return minutes + ' min';
            } else {
                return '&nbsp;';
            }
        }
        this.convertToTimeString = function(convertDate) {
            if (convertDate.getHours() == 0 && convertDate.getMinutes() == 0) {
                return '&nbsp;';
            }
            return convertDate.getHours() + ':' + this.padMinutes(convertDate.getMinutes());
        }
        this.getStartTimeString = function() {
            return this.convertToTimeString(this.getStartDate());
        }
        this.getEndTimeString = function() {
            return this.convertToTimeString(this.getEndDate());
        }
        this.convertToLocaleDate = function(convertDate) {
            var dateString = convertDate.toLocaleDateString();
            var regularExp = new RegExp("20[0-9][0-9]", "g");
            var result = dateString.replace(regularExp, '');
            // Removes year
            return result;
        }
        this.getStartDateString = function() {
            return this.convertToLocaleDate(this.getStartDate());
        }
        this.getEndDateString = function() {
            return this.convertToLocaleDate(this.getEndDate());
        }
    }
    
    var drawCalCallback = function(result) {
        //Draw recieved data
        var ourCalendarEventsArray = new Array();
        var ourArrayIndex = 0;
        var entries = result.feed.entry;
        for (var i = 0; i < entries.length; i++) {
            var eventEntry = entries[i];
            var eventTitle = eventEntry.getTitle().getText();
            var eventUrl = findFirstUrl(eventEntry.getContent().getText());
            var googleEventUrl = eventEntry.getHtmlLink().getHref();
            var whenList = eventEntry.getTimes();
            var whenItem = findFirstTime(whenList);
    
            var eventRrepeating = false;
            if (whenList.length > 1) {
                eventRrepeating = true;
            }
            ourCalendarEventsArray[ourArrayIndex++] = new calendarEventItem(whenItem, eventTitle, eventUrl, googleEventUrl, eventRrepeating);
        }
        var calendarTable = formatCalendarTitle();
        var ourEvent;
        ourCalendarEventsArray.sort(compareEvents);
        var lastDate = 'N/A';
        for (var i = 0; i < ourCalendarEventsArray.length; i++) {
            ourEvent = ourCalendarEventsArray[i];
            calendarTable += formatCalendarLine(ourEvent, lastDate)
            lastDate = ourEvent.getStartDateString();
        }
        calendarTable += formatCalendarEnd();
        var calendarDiv = document.getElementById('fullKalenderDiv');
        calendarDiv.innerHTML = calendarTable;
    }
    
    var formatCalendarTitle = function() {
        return '<table border="1" cellpadding="5">';
    }
    var formatCalendarEnd = function() {
        return '</table>';
    }
    
    var formatCalendarLine = function(ourEvent, lastDate) {
        var dateString = '&nbsp;';
        if (lastDate != ourEvent.getStartDateString()) {
            dateString = ourEvent.getStartDateString();
        }
        return '<tr><td class="startDate">' + dateString + '<td class="startTime">' + ourEvent.getStartTimeString() + '</td><td class="length">' + ourEvent.getLength() + '</td><td class="evetTitle"><a href="' + ourEvent.googleUrl + '">' + ourEvent.title + '</a></td><td class="url">' + ourEvent.url + '</td></tr>\n';
    }
    
    var drawCalHandleError = function(error) {
        alert(error);
    }
    
    return {
        //init:init,
        load:load
    }
})();

jQuery().ready(function() {
    if ($('fullKalenderDiv')) {
        //BSCGC.init('fullKalenderDiv');
        //BSCGC.load();
    }
});
