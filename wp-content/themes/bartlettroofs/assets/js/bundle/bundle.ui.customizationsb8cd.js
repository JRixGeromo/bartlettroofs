/* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */

(function ($, undefined) {

    var $window = $(window);

    function UTCDate() {
        return new Date(Date.UTC.apply(Date, arguments));
    }
    function UTCToday() {
        var today = new Date();
        return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
    }
    function alias(method) {
        return function () {
            return this[method].apply(this, arguments);
        };
    }

    var DateArray = (function () {
        var extras = {
            get: function (i) {
                return this.slice(i)[0];
            },
            contains: function (d) {
                // Array.indexOf is not cross-browser;
                // $.inArray doesn't work with Dates
                var val = d && d.valueOf();
                for (var i = 0, l = this.length; i < l; i++)
                    if (this[i].valueOf() === val)
                        return i;
                return -1;
            },
            remove: function (i) {
                this.splice(i, 1);
            },
            replace: function (new_array) {
                if (!new_array)
                    return;
                if (!$.isArray(new_array))
                    new_array = [new_array];
                this.clear();
                this.push.apply(this, new_array);
            },
            clear: function () {
                this.splice(0);
            },
            copy: function () {
                var a = new DateArray();
                a.replace(this);
                return a;
            }
        };

        return function () {
            var a = [];
            a.push.apply(a, arguments);
            $.extend(a, extras);
            return a;
        };
    })();


    // Picker object

    var Datepicker = function (element, options) {
        this.dates = new DateArray();
        this.viewDate = UTCToday();
        this.focusDate = null;

        this._process_options(options);

        this.element = $(element);
        this.isInline = false;
        this.isInput = this.element.is('input');
        this.component = this.element.is('.date') ? this.element.find('.add-on, .input-group-addon, .btn') : false;
        this.hasInput = this.component && this.element.find('input').length;
        if (this.component && this.component.length === 0)
            this.component = false;

        this.picker = $(DPGlobal.template);
        this._buildEvents();
        this._attachEvents();

        if (this.isInline) {
            this.picker.addClass('datepicker-inline').appendTo(this.element);
        }
        else {
            this.picker.addClass('datepicker-dropdown dropdown-menu');
        }

        if (this.o.rtl) {
            this.picker.addClass('datepicker-rtl');
        }

        this.viewMode = this.o.startView;

        if (this.o.calendarWeeks)
            this.picker.find('tfoot th.today')
                .attr('colspan', function (i, val) {
                    return parseInt(val) + 1;
                });

        this._allow_update = false;

        this.setStartDate(this._o.startDate);
        this.setEndDate(this._o.endDate);
        this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);

        this.fillDow();
        this.fillMonths();

        this._allow_update = true;

        this.update();
        this.showMode();

        if (this.isInline) {
            this.show();
        }
    };

    Datepicker.prototype = {
        constructor: Datepicker,

        _process_options: function (opts) {
            // Store raw options for reference
            this._o = $.extend({}, this._o, opts);
            // Processed options
            var o = this.o = $.extend({}, this._o);

            // Check if "de-DE" style date is available, if not language should
            // fallback to 2 letter code eg "de"
            var lang = o.language;
            if (!dates[lang]) {
                lang = lang.split('-')[0];
                if (!dates[lang])
                    lang = defaults.language;
            }
            o.language = lang;

            switch (o.startView) {
                case 2:
                case 'decade':
                    o.startView = 2;
                    break;
                case 1:
                case 'year':
                    o.startView = 1;
                    break;
                default:
                    o.startView = 0;
            }

            switch (o.minViewMode) {
                case 1:
                case 'months':
                    o.minViewMode = 1;
                    break;
                case 2:
                case 'years':
                    o.minViewMode = 2;
                    break;
                default:
                    o.minViewMode = 0;
            }

            o.startView = Math.max(o.startView, o.minViewMode);

            // true, false, or Number > 0
            if (o.multidate !== true) {
                o.multidate = Number(o.multidate) || false;
                if (o.multidate !== false)
                    o.multidate = Math.max(0, o.multidate);
                else
                    o.multidate = 1;
            }
            o.multidateSeparator = String(o.multidateSeparator);

            o.weekStart %= 7;
            o.weekEnd = ((o.weekStart + 6) % 7);

            var format = DPGlobal.parseFormat(o.format);
            if (o.startDate !== -Infinity) {
                if (!!o.startDate) {
                    if (o.startDate instanceof Date)
                        o.startDate = this._local_to_utc(this._zero_time(o.startDate));
                    else
                        o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
                }
                else {
                    o.startDate = -Infinity;
                }
            }
            if (o.endDate !== Infinity) {
                if (!!o.endDate) {
                    if (o.endDate instanceof Date)
                        o.endDate = this._local_to_utc(this._zero_time(o.endDate));
                    else
                        o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
                }
                else {
                    o.endDate = Infinity;
                }
            }

            o.daysOfWeekDisabled = o.daysOfWeekDisabled || [];
            if (!$.isArray(o.daysOfWeekDisabled))
                o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
            o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function (d) {
                return parseInt(d, 10);
            });

            var plc = String(o.orientation).toLowerCase().split(/\s+/g),
                _plc = o.orientation.toLowerCase();
            plc = $.grep(plc, function (word) {
                return (/^auto|left|right|top|bottom$/).test(word);
            });
            o.orientation = { x: 'auto', y: 'auto' };
            if (!_plc || _plc === 'auto')
                ; // no action
            else if (plc.length === 1) {
                switch (plc[0]) {
                    case 'top':
                    case 'bottom':
                        o.orientation.y = plc[0];
                        break;
                    case 'left':
                    case 'right':
                        o.orientation.x = plc[0];
                        break;
                }
            }
            else {
                _plc = $.grep(plc, function (word) {
                    return (/^left|right$/).test(word);
                });
                o.orientation.x = _plc[0] || 'auto';

                _plc = $.grep(plc, function (word) {
                    return (/^top|bottom$/).test(word);
                });
                o.orientation.y = _plc[0] || 'auto';
            }
            o.disableSwitcher = o.disableSwitcher;
            o.onlyActiveClickable = o.onlyActiveClickable;
            o.toggleMutidate = o.toggleMutidate;
        },
        _events: [],
        _secondaryEvents: [],
        _applyEvents: function (evs) {
            for (var i = 0, el, ch, ev; i < evs.length; i++) {
                el = evs[i][0];
                if (evs[i].length === 2) {
                    ch = undefined;
                    ev = evs[i][1];
                }
                else if (evs[i].length === 3) {
                    ch = evs[i][1];
                    ev = evs[i][2];
                }
                el.on(ev, ch);
            }
        },
        _unapplyEvents: function (evs) {
            for (var i = 0, el, ev, ch; i < evs.length; i++) {
                el = evs[i][0];
                if (evs[i].length === 2) {
                    ch = undefined;
                    ev = evs[i][1];
                }
                else if (evs[i].length === 3) {
                    ch = evs[i][1];
                    ev = evs[i][2];
                }
                el.off(ev, ch);
            }
        },
        _buildEvents: function () {
            if (this.isInput) { // single input
                this._events = [
                    [this.element, {
                        focus: $.proxy(this.show, this),
                        keyup: $.proxy(function (e) {
                            if ($.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13, 9]) === -1)
                                this.update();
                        }, this),
                        keydown: $.proxy(this.keydown, this)
                    }]
                ];
            }
            else if (this.component && this.hasInput) { // component: input + button
                this._events = [
                    // For components that are not readonly, allow keyboard nav
                    [this.element.find('input'), {
                        focus: $.proxy(this.show, this),
                        keyup: $.proxy(function (e) {
                            if ($.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13, 9]) === -1)
                                this.update();
                        }, this),
                        keydown: $.proxy(this.keydown, this)
                    }],
                    [this.component, {
                        click: $.proxy(this.show, this)
                    }]
                ];
            }
            else if (this.element.is('div')) {  // inline datepicker
                this.isInline = true;
            }
            else {
                this._events = [
                    [this.element, {
                        click: $.proxy(this.show, this)
                    }]
                ];
            }
            this._events.push(
                // Component: listen for blur on element descendants
                [this.element, '*', {
                    blur: $.proxy(function (e) {
                        this._focused_from = e.target;
                    }, this)
                }],
                // Input: listen for blur on element
                [this.element, {
                    blur: $.proxy(function (e) {
                        this._focused_from = e.target;
                    }, this)
                }]
            );

            this._secondaryEvents = [
                [this.picker, {
                    click: $.proxy(this.click, this)
                }],
                [$(window), {
                    resize: $.proxy(this.place, this)
                }],
                [$(document), {
                    'mousedown touchstart': $.proxy(function (e) {
                        // Clicked outside the datepicker, hide it
                        if (!(
                            this.element.is(e.target) ||
                            this.element.find(e.target).length ||
                            this.picker.is(e.target) ||
                            this.picker.find(e.target).length
                        )) {
                            this.hide();
                        }
                    }, this)
                }]
            ];
        },
        _attachEvents: function () {
            this._detachEvents();
            this._applyEvents(this._events);
        },
        _detachEvents: function () {
            this._unapplyEvents(this._events);
        },
        _attachSecondaryEvents: function () {
            this._detachSecondaryEvents();
            this._applyEvents(this._secondaryEvents);
        },
        _detachSecondaryEvents: function () {
            this._unapplyEvents(this._secondaryEvents);
        },
        _trigger: function (event, altdate) {
            var date = altdate || this.dates.get(-1),
                local_date = this._utc_to_local(date);

            this.element.trigger({
                type: event,
                date: local_date,
                dates: $.map(this.dates, this._utc_to_local),
                format: $.proxy(function (ix, format) {
                    if (arguments.length === 0) {
                        ix = this.dates.length - 1;
                        format = this.o.format;
                    }
                    else if (typeof ix === 'string') {
                        format = ix;
                        ix = this.dates.length - 1;
                    }
                    format = format || this.o.format;
                    var date = this.dates.get(ix);
                    return DPGlobal.formatDate(date, format, this.o.language);
                }, this)
            });
        },

        show: function () {
            if (!this.isInline)
                this.picker.appendTo('body');
            this.picker.show();
            this.place();
            this._attachSecondaryEvents();
            this._trigger('show');
        },

        hide: function () {
            if (this.isInline)
                return;
            if (!this.picker.is(':visible'))
                return;
            this.focusDate = null;
            this.picker.hide().detach();
            this._detachSecondaryEvents();
            this.viewMode = this.o.startView;
            this.showMode();

            if (
                this.o.forceParse &&
                (
                    this.isInput && this.element.val() ||
                    this.hasInput && this.element.find('input').val()
                )
            )
                this.setValue();
            this._trigger('hide');
        },

        remove: function () {
            this.hide();
            this._detachEvents();
            this._detachSecondaryEvents();
            this.picker.remove();
            delete this.element.data().datepicker;
            if (!this.isInput) {
                delete this.element.data().date;
            }
        },

        _utc_to_local: function (utc) {
            return utc && new Date(utc.getTime() + (utc.getTimezoneOffset() * 60000));
        },
        _local_to_utc: function (local) {
            return local && new Date(local.getTime() - (local.getTimezoneOffset() * 60000));
        },
        _zero_time: function (local) {
            return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
        },
        _zero_utc_time: function (utc) {
            return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
        },

        getDates: function () {
            return $.map(this.dates, this._utc_to_local);
        },

        getUTCDates: function () {
            return $.map(this.dates, function (d) {
                return new Date(d);
            });
        },

        getDate: function () {
            return this._utc_to_local(this.getUTCDate());
        },

        getUTCDate: function () {
            return new Date(this.dates.get(-1));
        },

        setDates: function () {
            var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
            this.update.apply(this, args);
            this._trigger('changeDate');
            this.setValue();
        },

        setUTCDates: function () {
            var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
            this.update.apply(this, $.map(args, this._utc_to_local));
            this._trigger('changeDate');
            this.setValue();
        },

        setDate: alias('setDates'),
        setUTCDate: alias('setUTCDates'),

        setValue: function () {
            var formatted = this.getFormattedDate();
            if (!this.isInput) {
                if (this.component) {
                    this.element.find('input').val(formatted).change();
                }
            }
            else {
                this.element.val(formatted).change();
            }
        },

        getFormattedDate: function (format) {
            if (format === undefined)
                format = this.o.format;

            var lang = this.o.language;
            return $.map(this.dates, function (d) {
                return DPGlobal.formatDate(d, format, lang);
            }).join(this.o.multidateSeparator);
        },

        setStartDate: function (startDate) {
            this._process_options({ startDate: startDate });
            this.update();
            this.updateNavArrows();
        },

        setEndDate: function (endDate) {
            this._process_options({ endDate: endDate });
            this.update();
            this.updateNavArrows();
        },

        setDaysOfWeekDisabled: function (daysOfWeekDisabled) {
            this._process_options({ daysOfWeekDisabled: daysOfWeekDisabled });
            this.update();
            this.updateNavArrows();
        },

        place: function () {
            if (this.isInline)
                return;
            var calendarWidth = this.picker.outerWidth(),
                calendarHeight = this.picker.outerHeight(),
                visualPadding = 10,
                windowWidth = $window.width(),
                windowHeight = $window.height(),
                scrollTop = $window.scrollTop();

            var zIndex = parseInt(this.element.parents().filter(function () {
                return $(this).css('z-index') !== 'auto';
            }).first().css('z-index')) + 10;
            var offset = this.component ? this.component.parent().offset() : this.element.offset();
            var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(false);
            var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(false);
            var left = offset.left,
                top = offset.top;

            this.picker.removeClass(
                'datepicker-orient-top datepicker-orient-bottom ' +
                'datepicker-orient-right datepicker-orient-left'
            );

            if (this.o.orientation.x !== 'auto') {
                this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
                if (this.o.orientation.x === 'right')
                    left -= calendarWidth - width;
            }
            // auto x orientation is best-placement: if it crosses a window
            // edge, fudge it sideways
            else {
                // Default to left
                this.picker.addClass('datepicker-orient-left');
                if (offset.left < 0)
                    left -= offset.left - visualPadding;
                else if (offset.left + calendarWidth > windowWidth)
                    left = windowWidth - calendarWidth - visualPadding;
            }

            // auto y orientation is best-situation: top or bottom, no fudging,
            // decision based on which shows more of the calendar
            var yorient = this.o.orientation.y,
                top_overflow, bottom_overflow;
            if (yorient === 'auto') {
                top_overflow = -scrollTop + offset.top - calendarHeight;
                bottom_overflow = scrollTop + windowHeight - (offset.top + height + calendarHeight);
                if (Math.max(top_overflow, bottom_overflow) === bottom_overflow)
                    yorient = 'top';
                else
                    yorient = 'bottom';
            }
            this.picker.addClass('datepicker-orient-' + yorient);
            if (yorient === 'top')
                top += height;
            else
                top -= calendarHeight + parseInt(this.picker.css('padding-top'));

            this.picker.css({
                top: top,
                left: left,
                zIndex: zIndex
            });
        },

        _allow_update: true,
        update: function () {
            if (!this._allow_update)
                return;

            var oldDates = this.dates.copy(),
                dates = [],
                fromArgs = false;
            if (arguments.length) {
                $.each(arguments, $.proxy(function (i, date) {
                    if (date instanceof Date)
                        date = this._local_to_utc(date);
                    dates.push(date);
                }, this));
                fromArgs = true;
            }
            else {
                dates = this.isInput
                    ? this.element.val()
                    : this.element.data('date') || this.element.find('input').val();
                if (dates && this.o.multidate)
                    dates = dates.split(this.o.multidateSeparator);
                else
                    dates = [dates];
                delete this.element.data().date;
            }

            dates = $.map(dates, $.proxy(function (date) {
                return DPGlobal.parseDate(date, this.o.format, this.o.language);
            }, this));
            dates = $.grep(dates, $.proxy(function (date) {
                return (
                    date < this.o.startDate ||
                    date > this.o.endDate ||
                    !date
                );
            }, this), true);
            this.dates.replace(dates);

            if (this.dates.length)
                this.viewDate = new Date(this.dates.get(-1));
            else if (this.viewDate < this.o.startDate)
                this.viewDate = new Date(this.o.startDate);
            else if (this.viewDate > this.o.endDate)
                this.viewDate = new Date(this.o.endDate);

            if (fromArgs) {
                // setting date by clicking
                this.setValue();
            }
            else if (dates.length) {
                // setting date by typing
                if (String(oldDates) !== String(this.dates))
                    this._trigger('changeDate');
            }
            if (!this.dates.length && oldDates.length)
                this._trigger('clearDate');

            this.fill();
        },

        fillDow: function () {
            var dowCnt = this.o.weekStart,
                html = '<tr>';
            if (this.o.calendarWeeks) {
                var cell = '<th class="cw">&nbsp;</th>';
                html += cell;
                this.picker.find('.datepicker-days thead tr:first-child').prepend(cell);
            }
            while (dowCnt < this.o.weekStart + 7) {
                html += '<th class="dow">' + dates[this.o.language].daysMin[(dowCnt++) % 7] + '</th>';
            }
            html += '</tr>';
            this.picker.find('.datepicker-days thead').append(html);
        },

        fillMonths: function () {
            var html = '',
                i = 0;
            while (i < 12) {
                html += '<span class="month">' + dates[this.o.language].monthsShort[i++] + '</span>';
            }
            this.picker.find('.datepicker-months td').html(html);
        },

        setRange: function (range) {
            if (!range || !range.length)
                delete this.range;
            else
                this.range = $.map(range, function (d) {
                    return d.valueOf();
                });
            this.fill();
        },

        getClassNames: function (date) {
            var cls = [],
                year = this.viewDate.getUTCFullYear(),
                month = this.viewDate.getUTCMonth(),
                today = new Date();
            if (date.getUTCFullYear() < year || (date.getUTCFullYear() === year && date.getUTCMonth() < month)) {
                cls.push('old');
            }
            else if (date.getUTCFullYear() > year || (date.getUTCFullYear() === year && date.getUTCMonth() > month)) {
                cls.push('new');
            }
            if (this.focusDate && date.valueOf() === this.focusDate.valueOf())
                cls.push('focused');
            // Compare internal UTC date with local today, not UTC today
            if (this.o.todayHighlight &&
                date.getUTCFullYear() === today.getFullYear() &&
                date.getUTCMonth() === today.getMonth() &&
                date.getUTCDate() === today.getDate()) {
                cls.push('today');
            }
            if (this.dates.contains(date) !== -1)
                cls.push('active');
            if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate ||
                $.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1) {
                cls.push('disabled');
            }
            if (this.range) {
                if (date > this.range[0] && date < this.range[this.range.length - 1]) {
                    cls.push('range');
                }
                if ($.inArray(date.valueOf(), this.range) !== -1) {
                    cls.push('selected');
                }
            }
            return cls;
        },

        fill: function () {
            var d = new Date(this.viewDate),
                year = d.getUTCFullYear(),
                month = d.getUTCMonth(),
                startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -Infinity,
                startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -Infinity,
                endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
                endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
                todaytxt = dates[this.o.language].today || dates['en'].today || '',
                cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
                tooltip;
            this.picker.find('.datepicker-days thead th.datepicker-switch')
                .text(dates[this.o.language].months[month] + ' ' + year);
            this.picker.find('tfoot th.today')
                .text(todaytxt)
                .toggle(this.o.todayBtn !== false);
            this.picker.find('tfoot th.clear')
                .text(cleartxt)
                .toggle(this.o.clearBtn !== false);
            this.updateNavArrows();
            this.fillMonths();
            var prevMonth = UTCDate(year, month - 1, 28),
                day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
            prevMonth.setUTCDate(day);
            prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7) % 7);
            var nextMonth = new Date(prevMonth);
            nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
            nextMonth = nextMonth.valueOf();
            var html = [];
            var clsName;
            while (prevMonth.valueOf() < nextMonth) {
                if (prevMonth.getUTCDay() === this.o.weekStart) {
                    html.push('<tr>');
                    if (this.o.calendarWeeks) {
                        // ISO 8601: First week contains first thursday.
                        // ISO also states week starts on Monday, but we can be more abstract here.
                        var
                            // Start of current week: based on weekstart/current date
                            ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) % 7 * 864e5),
                            // Thursday of this week
                            th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),
                            // First Thursday of year, year from thursday
                            yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 - yth.getUTCDay()) % 7 * 864e5),
                            // Calendar week: ms between thursdays, div ms per day, div 7 days
                            calWeek = (th - yth) / 864e5 / 7 + 1;
                        html.push('<td class="cw">' + calWeek + '</td>');

                    }
                }
                clsName = this.getClassNames(prevMonth);
                clsName.push('day');

                if (this.o.beforeShowDay !== $.noop) {
                    var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
                    if (before === undefined)
                        before = {};
                    else if (typeof (before) === 'boolean')
                        before = { enabled: before };
                    else if (typeof (before) === 'string')
                        before = { classes: before };
                    if (before.enabled === false)
                        clsName.push('disabled');
                    if (before.classes)
                        clsName = clsName.concat(before.classes.split(/\s+/));
                    if (before.tooltip)
                        tooltip = before.tooltip;
                }

                clsName = $.unique(clsName);
                html.push('<td class="' + clsName.join(' ') + '"' + (tooltip ? ' title="' + tooltip + '"' : '') + '>' + prevMonth.getUTCDate() + '</td>');
                if (prevMonth.getUTCDay() === this.o.weekEnd) {
                    html.push('</tr>');
                }
                prevMonth.setUTCDate(prevMonth.getUTCDate() + 1);
            }
            this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

            var months = this.picker.find('.datepicker-months')
                .find('th:eq(1)')
                .text(year)
                .end()
                .find('span').removeClass('active');

            $.each(this.dates, function (i, d) {
                if (d.getUTCFullYear() === year)
                    months.eq(d.getUTCMonth()).addClass('active');
            });

            if (year < startYear || year > endYear) {
                months.addClass('disabled');
            }
            if (year === startYear) {
                months.slice(0, startMonth).addClass('disabled');
            }
            if (year === endYear) {
                months.slice(endMonth + 1).addClass('disabled');
            }

            html = '';
            year = parseInt(year / 10, 10) * 10;
            var yearCont = this.picker.find('.datepicker-years')
                .find('th:eq(1)')
                .text(year + '-' + (year + 9))
                .end()
                .find('td');
            year -= 1;
            var years = $.map(this.dates, function (d) {
                return d.getUTCFullYear();
            }),
                classes;
            for (var i = -1; i < 11; i++) {
                classes = ['year'];
                if (i === -1)
                    classes.push('old');
                else if (i === 10)
                    classes.push('new');
                if ($.inArray(year, years) !== -1)
                    classes.push('active');
                if (year < startYear || year > endYear)
                    classes.push('disabled');
                html += '<span class="' + classes.join(' ') + '">' + year + '</span>';
                year += 1;
            }
            yearCont.html(html);
        },

        updateNavArrows: function () {
            if (!this._allow_update)
                return;

            var d = new Date(this.viewDate),
                year = d.getUTCFullYear(),
                month = d.getUTCMonth();
            switch (this.viewMode) {
                case 0:
                    if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() && month <= this.o.startDate.getUTCMonth()) {
                        this.picker.find('.prev').css({ visibility: 'hidden' });
                    }
                    else {
                        this.picker.find('.prev').css({ visibility: 'visible' });
                    }
                    if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() && month >= this.o.endDate.getUTCMonth()) {
                        this.picker.find('.next').css({ visibility: 'hidden' });
                    }
                    else {
                        this.picker.find('.next').css({ visibility: 'visible' });
                    }
                    break;
                case 1:
                case 2:
                    if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()) {
                        this.picker.find('.prev').css({ visibility: 'hidden' });
                    }
                    else {
                        this.picker.find('.prev').css({ visibility: 'visible' });
                    }
                    if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()) {
                        this.picker.find('.next').css({ visibility: 'hidden' });
                    }
                    else {
                        this.picker.find('.next').css({ visibility: 'visible' });
                    }
                    break;
            }
        },

        click: function (e) {
            e.preventDefault();
            var target = $(e.target).closest('span, td, th'),
                year, month, day;
            if (target.length === 1) {
                switch (target[0].nodeName.toLowerCase()) {
                    case 'th':
                        switch (target[0].className) {
                            case 'datepicker-switch':
                                if (!this.o.disableSwitcher) this.showMode(1);
                                break;
                            case 'prev':
                            case 'next':
                                var dir = DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1);
                                switch (this.viewMode) {
                                    case 0:
                                        this.viewDate = this.moveMonth(this.viewDate, dir);
                                        this._trigger('changeMonth', this.viewDate);
                                        break;
                                    case 1:
                                    case 2:
                                        this.viewDate = this.moveYear(this.viewDate, dir);
                                        if (this.viewMode === 1)
                                            this._trigger('changeYear', this.viewDate);
                                        break;
                                }
                                this.fill();
                                break;
                            case 'today':
                                var date = new Date();
                                date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);

                                this.showMode(-2);
                                var which = this.o.todayBtn === 'linked' ? null : 'view';
                                this._setDate(date, which);
                                break;
                            case 'clear':
                                var element;
                                if (this.isInput)
                                    element = this.element;
                                else if (this.component)
                                    element = this.element.find('input');
                                if (element)
                                    element.val("").change();
                                this.update();
                                this._trigger('changeDate');
                                if (this.o.autoclose)
                                    this.hide();
                                break;
                        }
                        break;
                    case 'span':
                        if (!target.is('.disabled')) {
                            this.viewDate.setUTCDate(1);
                            if (target.is('.month')) {
                                day = 1;
                                month = target.parent().find('span').index(target);
                                year = this.viewDate.getUTCFullYear();
                                this.viewDate.setUTCMonth(month);
                                this._trigger('changeMonth', this.viewDate);
                                if (this.o.minViewMode === 1) {
                                    this._setDate(UTCDate(year, month, day));
                                }
                            }
                            else {
                                day = 1;
                                month = 0;
                                year = parseInt(target.text(), 10) || 0;
                                this.viewDate.setUTCFullYear(year);
                                this._trigger('changeYear', this.viewDate);
                                if (this.o.minViewMode === 2) {
                                    this._setDate(UTCDate(year, month, day));
                                }
                            }
                            this.showMode(-1);
                            this.fill();
                        }
                        break;
                    case 'td':
                        var isTrue = false;

                        if (!this.o.onlyActiveClickable) {
                            isTrue = target.is('.day') && !target.is('.disabled');
                        } else {
                            isTrue = target.is('.day') && !target.is('.disabled') && target.is('.active');
                        }

                        if (isTrue) {
                            day = parseInt(target.text(), 10) || 1;
                            year = this.viewDate.getUTCFullYear();
                            month = this.viewDate.getUTCMonth();
                            if (target.is('.old')) {
                                if (month === 0) {
                                    month = 11;
                                    year -= 1;
                                }
                                else {
                                    month -= 1;
                                }
                            }
                            else if (target.is('.new')) {
                                if (month === 11) {
                                    month = 0;
                                    year += 1;
                                }
                                else {
                                    month += 1;
                                }
                            }

                            this._setDate(UTCDate(year, month, day));

                            this.element.trigger("dateClicked", {
                                year: year,
                                month: month + 1,
                                day: day
                            });
                        }
                        break;
                }
            }
            if (this.picker.is(':visible') && this._focused_from) {
                $(this._focused_from).focus();
            }
            delete this._focused_from;
        },

        _toggle_multidate: function (date) {
            var ix = this.dates.contains(date);
            if (!date) {
                this.dates.clear();
            }
            else if (ix !== -1) {
                this.dates.remove(ix);
            }
            else {
                this.dates.push(date);
            }
            if (typeof this.o.multidate === 'number')
                while (this.dates.length > this.o.multidate)
                    this.dates.remove(0);
        },

        _setDate: function (date, which) {
            if (!which || which === 'date')
                if (this.o.toggleMutidate) this._toggle_multidate(date && new Date(date));
            if (!which || which === 'view')
                this.viewDate = date && new Date(date);

            this.fill();
            this.setValue();
            this._trigger('changeDate');
            var element;
            if (this.isInput) {
                element = this.element;
            }
            else if (this.component) {
                element = this.element.find('input');
            }
            if (element) {
                element.change();
            }
            if (this.o.autoclose && (!which || which === 'date')) {
                this.hide();
            }
        },

        moveMonth: function (date, dir) {
            if (!date)
                return undefined;
            if (!dir)
                return date;
            var new_date = new Date(date.valueOf()),
                day = new_date.getUTCDate(),
                month = new_date.getUTCMonth(),
                mag = Math.abs(dir),
                new_month, test;
            dir = dir > 0 ? 1 : -1;
            if (mag === 1) {
                test = dir === -1
                    // If going back one month, make sure month is not current month
                    // (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
                    ? function () {
                        return new_date.getUTCMonth() === month;
                    }
                    // If going forward one month, make sure month is as expected
                    // (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
                    : function () {
                        return new_date.getUTCMonth() !== new_month;
                    };
                new_month = month + dir;
                new_date.setUTCMonth(new_month);
                // Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
                if (new_month < 0 || new_month > 11)
                    new_month = (new_month + 12) % 12;
            }
            else {
                // For magnitudes >1, move one month at a time...
                for (var i = 0; i < mag; i++)
                    // ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
                    new_date = this.moveMonth(new_date, dir);
                // ...then reset the day, keeping it in the new month
                new_month = new_date.getUTCMonth();
                new_date.setUTCDate(day);
                test = function () {
                    return new_month !== new_date.getUTCMonth();
                };
            }
            // Common date-resetting loop -- if date is beyond end of month, make it
            // end of month
            while (test()) {
                new_date.setUTCDate(--day);
                new_date.setUTCMonth(new_month);
            }
            return new_date;
        },

        moveYear: function (date, dir) {
            return this.moveMonth(date, dir * 12);
        },

        dateWithinRange: function (date) {
            return date >= this.o.startDate && date <= this.o.endDate;
        },

        keydown: function (e) {
            if (this.picker.is(':not(:visible)')) {
                if (e.keyCode === 27) // allow escape to hide and re-show picker
                    this.show();
                return;
            }
            var dateChanged = false,
                dir, newDate, newViewDate,
                focusDate = this.focusDate || this.viewDate;
            switch (e.keyCode) {
                case 27: // escape
                    if (this.focusDate) {
                        this.focusDate = null;
                        this.viewDate = this.dates.get(-1) || this.viewDate;
                        this.fill();
                    }
                    else
                        this.hide();
                    e.preventDefault();
                    break;
                case 37: // left
                case 39: // right
                    if (!this.o.keyboardNavigation)
                        break;
                    dir = e.keyCode === 37 ? -1 : 1;
                    if (e.ctrlKey) {
                        newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                        newViewDate = this.moveYear(focusDate, dir);
                        this._trigger('changeYear', this.viewDate);
                    }
                    else if (e.shiftKey) {
                        newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                        newViewDate = this.moveMonth(focusDate, dir);
                        this._trigger('changeMonth', this.viewDate);
                    }
                    else {
                        newDate = new Date(this.dates.get(-1) || UTCToday());
                        newDate.setUTCDate(newDate.getUTCDate() + dir);
                        newViewDate = new Date(focusDate);
                        newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
                    }
                    if (this.dateWithinRange(newDate)) {
                        this.focusDate = this.viewDate = newViewDate;
                        this.setValue();
                        this.fill();
                        e.preventDefault();
                    }
                    break;
                case 38: // up
                case 40: // down
                    if (!this.o.keyboardNavigation)
                        break;
                    dir = e.keyCode === 38 ? -1 : 1;
                    if (e.ctrlKey) {
                        newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                        newViewDate = this.moveYear(focusDate, dir);
                        this._trigger('changeYear', this.viewDate);
                    }
                    else if (e.shiftKey) {
                        newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                        newViewDate = this.moveMonth(focusDate, dir);
                        this._trigger('changeMonth', this.viewDate);
                    }
                    else {
                        newDate = new Date(this.dates.get(-1) || UTCToday());
                        newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
                        newViewDate = new Date(focusDate);
                        newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
                    }
                    if (this.dateWithinRange(newDate)) {
                        this.focusDate = this.viewDate = newViewDate;
                        this.setValue();
                        this.fill();
                        e.preventDefault();
                    }
                    break;
                case 32: // spacebar
                    // Spacebar is used in manually typing dates in some formats.
                    // As such, its behavior should not be hijacked.
                    break;
                case 13: // enter
                    focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
                    this._toggle_multidate(focusDate);
                    dateChanged = true;
                    this.focusDate = null;
                    this.viewDate = this.dates.get(-1) || this.viewDate;
                    this.setValue();
                    this.fill();
                    if (this.picker.is(':visible')) {
                        e.preventDefault();
                        if (this.o.autoclose)
                            this.hide();
                    }
                    break;
                case 9: // tab
                    this.focusDate = null;
                    this.viewDate = this.dates.get(-1) || this.viewDate;
                    this.fill();
                    this.hide();
                    break;
            }
            if (dateChanged) {
                if (this.dates.length)
                    this._trigger('changeDate');
                else
                    this._trigger('clearDate');
                var element;
                if (this.isInput) {
                    element = this.element;
                }
                else if (this.component) {
                    element = this.element.find('input');
                }
                if (element) {
                    element.change();
                }
            }
        },

        showMode: function (dir) {
            if (dir) {
                this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
            }
            this.picker
                .find('>div')
                .hide()
                .filter('.datepicker-' + DPGlobal.modes[this.viewMode].clsName)
                .css('display', 'block');
            this.updateNavArrows();
        }
    };

    var DateRangePicker = function (element, options) {
        this.element = $(element);
        this.inputs = $.map(options.inputs, function (i) {
            return i.jquery ? i[0] : i;
        });
        delete options.inputs;

        $(this.inputs)
            .datepicker(options)
            .bind('changeDate', $.proxy(this.dateUpdated, this));

        this.pickers = $.map(this.inputs, function (i) {
            return $(i).data('datepicker');
        });
        this.updateDates();
    };
    DateRangePicker.prototype = {
        updateDates: function () {
            this.dates = $.map(this.pickers, function (i) {
                return i.getUTCDate();
            });
            this.updateRanges();
        },
        updateRanges: function () {
            var range = $.map(this.dates, function (d) {
                return d.valueOf();
            });
            $.each(this.pickers, function (i, p) {
                p.setRange(range);
            });
        },
        dateUpdated: function (e) {
            // `this.updating` is a workaround for preventing infinite recursion
            // between `changeDate` triggering and `setUTCDate` calling.  Until
            // there is a better mechanism.
            if (this.updating)
                return;
            this.updating = true;

            var dp = $(e.target).data('datepicker'),
                new_date = dp.getUTCDate(),
                i = $.inArray(e.target, this.inputs),
                l = this.inputs.length;
            if (i === -1)
                return;

            $.each(this.pickers, function (i, p) {
                if (!p.getUTCDate())
                    p.setUTCDate(new_date);
            });

            if (new_date < this.dates[i]) {
                // Date being moved earlier/left
                while (i >= 0 && new_date < this.dates[i]) {
                    this.pickers[i--].setUTCDate(new_date);
                }
            }
            else if (new_date > this.dates[i]) {
                // Date being moved later/right
                while (i < l && new_date > this.dates[i]) {
                    this.pickers[i++].setUTCDate(new_date);
                }
            }
            this.updateDates();

            delete this.updating;
        },
        remove: function () {
            $.map(this.pickers, function (p) { p.remove(); });
            delete this.element.data().datepicker;
        }
    };

    function opts_from_el(el, prefix) {
        // Derive options from element data-attrs
        var data = $(el).data(),
            out = {}, inkey,
            replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
        prefix = new RegExp('^' + prefix.toLowerCase());
        function re_lower(_, a) {
            return a.toLowerCase();
        }
        for (var key in data)
            if (prefix.test(key)) {
                inkey = key.replace(replace, re_lower);
                out[inkey] = data[key];
            }
        return out;
    }

    function opts_from_locale(lang) {
        // Derive options from locale plugins
        var out = {};
        // Check if "de-DE" style date is available, if not language should
        // fallback to 2 letter code eg "de"
        if (!dates[lang]) {
            lang = lang.split('-')[0];
            if (!dates[lang])
                return;
        }
        var d = dates[lang];
        $.each(locale_opts, function (i, k) {
            if (k in d)
                out[k] = d[k];
        });
        return out;
    }

    var old = $.fn.datepicker;
    $.fn.datepicker = function (option) {
        var args = Array.apply(null, arguments);
        args.shift();
        var internal_return;
        this.each(function () {
            var $this = $(this),
                data = $this.data('datepicker'),
                options = typeof option === 'object' && option;
            if (!data) {
                var elopts = opts_from_el(this, 'date'),
                    // Preliminary otions
                    xopts = $.extend({}, defaults, elopts, options),
                    locopts = opts_from_locale(xopts.language),
                    // Options priority: js args, data-attrs, locales, defaults
                    opts = $.extend({}, defaults, locopts, elopts, options);
                if ($this.is('.input-daterange') || opts.inputs) {
                    var ropts = {
                        inputs: opts.inputs || $this.find('input').toArray()
                    };
                    $this.data('datepicker', (data = new DateRangePicker(this, $.extend(opts, ropts))));
                }
                else {
                    $this.data('datepicker', (data = new Datepicker(this, opts)));
                }
            }
            if (typeof option === 'string' && typeof data[option] === 'function') {
                internal_return = data[option].apply(data, args);
                if (internal_return !== undefined)
                    return false;
            }
        });
        if (internal_return !== undefined)
            return internal_return;
        else
            return this;
    };

    var defaults = $.fn.datepicker.defaults = {
        autoclose: false,
        beforeShowDay: $.noop,
        calendarWeeks: false,
        clearBtn: false,
        daysOfWeekDisabled: [],
        endDate: Infinity,
        forceParse: true,
        format: 'mm/dd/yyyy',
        keyboardNavigation: true,
        language: 'en',
        minViewMode: 0,
        multidate: false,
        multidateSeparator: ',',
        orientation: "auto",
        rtl: false,
        startDate: -Infinity,
        startView: 0,
        todayBtn: false,
        todayHighlight: false,
        weekStart: 0,
        disableSwitcher: false,
        onlyActiveClickable: false,
        toggleMutidate: true
    };
    var locale_opts = $.fn.datepicker.locale_opts = [
        'format',
        'rtl',
        'weekStart'
    ];
    $.fn.datepicker.Constructor = Datepicker;
    var dates = $.fn.datepicker.dates = {
        en: {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            today: "Today",
            clear: "Clear"
        }
    };

    var DPGlobal = {
        modes: [
            {
                clsName: 'days',
                navFnc: 'Month',
                navStep: 1
            },
            {
                clsName: 'months',
                navFnc: 'FullYear',
                navStep: 1
            },
            {
                clsName: 'years',
                navFnc: 'FullYear',
                navStep: 10
            }],
        isLeapYear: function (year) {
            return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
        },
        getDaysInMonth: function (year, month) {
            return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
        },
        validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
        nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
        parseFormat: function (format) {
            // IE treats \0 as a string end in inputs (truncating the value),
            // so it's a bad format delimiter, anyway
            var separators = format.replace(this.validParts, '\0').split('\0'),
                parts = format.match(this.validParts);
            if (!separators || !separators.length || !parts || parts.length === 0) {
                throw new Error("Invalid date format.");
            }
            return { separators: separators, parts: parts };
        },
        parseDate: function (date, format, language) {
            if (!date)
                return undefined;
            if (date instanceof Date)
                return date;
            if (typeof format === 'string')
                format = DPGlobal.parseFormat(format);
            var part_re = /([\-+]\d+)([dmwy])/,
                parts = date.match(/([\-+]\d+)([dmwy])/g),
                part, dir, i;
            if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)) {
                date = new Date();
                for (i = 0; i < parts.length; i++) {
                    part = part_re.exec(parts[i]);
                    dir = parseInt(part[1]);
                    switch (part[2]) {
                        case 'd':
                            date.setUTCDate(date.getUTCDate() + dir);
                            break;
                        case 'm':
                            date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
                            break;
                        case 'w':
                            date.setUTCDate(date.getUTCDate() + dir * 7);
                            break;
                        case 'y':
                            date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
                            break;
                    }
                }
                return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
            }
            parts = date && date.match(this.nonpunctuation) || [];
            date = new Date();
            var parsed = {},
                setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
                setters_map = {
                    yyyy: function (d, v) {
                        return d.setUTCFullYear(v);
                    },
                    yy: function (d, v) {
                        return d.setUTCFullYear(2000 + v);
                    },
                    m: function (d, v) {
                        if (isNaN(d))
                            return d;
                        v -= 1;
                        while (v < 0) v += 12;
                        v %= 12;
                        d.setUTCMonth(v);
                        while (d.getUTCMonth() !== v)
                            d.setUTCDate(d.getUTCDate() - 1);
                        return d;
                    },
                    d: function (d, v) {
                        return d.setUTCDate(v);
                    }
                },
                val, filtered;
            setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
            setters_map['dd'] = setters_map['d'];
            date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
            var fparts = format.parts.slice();
            // Remove noop parts
            if (parts.length !== fparts.length) {
                fparts = $(fparts).filter(function (i, p) {
                    return $.inArray(p, setters_order) !== -1;
                }).toArray();
            }
            // Process remainder
            function match_part() {
                var m = this.slice(0, parts[i].length),
                    p = parts[i].slice(0, m.length);
                return m === p;
            }
            if (parts.length === fparts.length) {
                var cnt;
                for (i = 0, cnt = fparts.length; i < cnt; i++) {
                    val = parseInt(parts[i], 10);
                    part = fparts[i];
                    if (isNaN(val)) {
                        switch (part) {
                            case 'MM':
                                filtered = $(dates[language].months).filter(match_part);
                                val = $.inArray(filtered[0], dates[language].months) + 1;
                                break;
                            case 'M':
                                filtered = $(dates[language].monthsShort).filter(match_part);
                                val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
                                break;
                        }
                    }
                    parsed[part] = val;
                }
                var _date, s;
                for (i = 0; i < setters_order.length; i++) {
                    s = setters_order[i];
                    if (s in parsed && !isNaN(parsed[s])) {
                        _date = new Date(date);
                        setters_map[s](_date, parsed[s]);
                        if (!isNaN(_date))
                            date = _date;
                    }
                }
            }
            return date;
        },
        formatDate: function (date, format, language) {
            if (!date)
                return '';
            if (typeof format === 'string')
                format = DPGlobal.parseFormat(format);
            var val = {
                d: date.getUTCDate(),
                D: dates[language].daysShort[date.getUTCDay()],
                DD: dates[language].days[date.getUTCDay()],
                m: date.getUTCMonth() + 1,
                M: dates[language].monthsShort[date.getUTCMonth()],
                MM: dates[language].months[date.getUTCMonth()],
                yy: date.getUTCFullYear().toString().substring(2),
                yyyy: date.getUTCFullYear()
            };
            val.dd = (val.d < 10 ? '0' : '') + val.d;
            val.mm = (val.m < 10 ? '0' : '') + val.m;
            date = [];
            var seps = $.extend([], format.separators);
            for (var i = 0, cnt = format.parts.length; i <= cnt; i++) {
                if (seps.length)
                    date.push(seps.shift());
                date.push(val[format.parts[i]]);
            }
            return date.join('');
        },
        headTemplate: '<thead>' +
            '<tr>' +
            '<th class="prev">&laquo;</th>' +
            '<th colspan="5" class="datepicker-switch"></th>' +
            '<th class="next">&raquo;</th>' +
            '</tr>' +
            '</thead>',
        contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
        footTemplate: '<tfoot>' +
            '<tr>' +
            '<th colspan="7" class="today"></th>' +
            '</tr>' +
            '<tr>' +
            '<th colspan="7" class="clear"></th>' +
            '</tr>' +
            '</tfoot>'
    };
    DPGlobal.template = '<div class="datepicker">' +
        '<div class="datepicker-days">' +
        '<table class=" table-condensed">' +
        DPGlobal.headTemplate +
        '<tbody></tbody>' +
        DPGlobal.footTemplate +
        '</table>' +
        '</div>' +
        '<div class="datepicker-months">' +
        '<table class="table-condensed">' +
        DPGlobal.headTemplate +
        DPGlobal.contTemplate +
        DPGlobal.footTemplate +
        '</table>' +
        '</div>' +
        '<div class="datepicker-years">' +
        '<table class="table-condensed">' +
        DPGlobal.headTemplate +
        DPGlobal.contTemplate +
        DPGlobal.footTemplate +
        '</table>' +
        '</div>' +
        '</div>';

    $.fn.datepicker.DPGlobal = DPGlobal;


    /* DATEPICKER NO CONFLICT
    * =================== */

    $.fn.datepicker.noConflict = function () {
        $.fn.datepicker = old;
        return this;
    };


    /* DATEPICKER DATA-API
    * ================== */

    $(document).on(
        'focus.datepicker.data-api click.datepicker.data-api',
        '[data-provide="datepicker"]',
        function (e) {
            var $this = $(this);
            if ($this.data('datepicker'))
                return;
            e.preventDefault();
            // component click requires us to explicitly show it
            $this.datepicker('show');
        }
    );
    $(function () {
        $('[data-provide="datepicker-inline"]').datepicker();
    });

}(window.jQuery));

function saveCookie(name, value, expires, path) {
    var today = new Date();
    today.setTime(today.getTime());
    if (expires) {
        expires = expires * 1000 * 60 * 60 * 24;
    }
    var expires_date = new Date(today.getTime() + (expires));
    document.cookie = name + '=' + escape(value) + ((expires) ? ';expires=' + expires_date.toUTCString() : '') + ';path=' + path + ';samesite=lax';
}

function getCookie(name) {
    var start = document.cookie.indexOf(name + '=');
    var len = start + name.length + 1;
    if ((!start) && (name != document.cookie.substring(0, name.length))) {
        return null;
    }
    if (start == -1) return null;
    var end = document.cookie.indexOf(';', len);
    if (end == -1) end = document.cookie.length;
    return unescape(document.cookie.substring(len, end));
}

function readCookie(cookiename) {
    var cookiestring = RegExp("" + cookiename + "[^;]+").exec(document.cookie);
    return decodeURIComponent(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./, "") : "");
}

function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function queryString(name) {
    hu = window.location.search.substring(1);
    r = '';
    if (hu != '') {
        gy = hu.split('&');
        for (i = 0; i < gy.length; i++) {
            ft = gy[i].split('=');
            if (ft[0] == name) {
                r = ft[1];
            }
        }
        return r;
    } else { return ''; }
}

function parseQueryString(queryString, name) {
    r = '';
    if (queryString != '') {
        gy = queryString.split('&');
        for (i = 0; i < gy.length; i++) {
            ft = gy[i].split('=');
            if (ft[0] == name) {
                r = ft[1];
            }
        }
        return r;
    } else { return ''; }
}

function queryStringMvc(name) {
    var re = new RegExp("\\/" + name + "\\.(.+?)\\/", "i");
    var m = re.exec(window.location.href);
    if (m) {
        return m[1];
    } else { return ''; }
}

function regExMatch(regex, text, group) {
    var m = regex.exec(text);
    if (m) {
        return m[group];
    } else {
        return "";
    }
}

function getFormVal(id) {
    var r = encodeURIComponent($.trim($("#" + id).val()));
    if (r == "undefined") {
        return "";
    } else {
        return r;
    }
}

function getCurrentUrl(onlyPathName) {
    if (arguments.length > 0 && onlyPathName) {
        return window.location.pathname;
    } else {
        var w = window.location;
        var p = window.location.port;
        return w.protocol + "//" + w.hostname + ((p != "" && p != "80" && p != "443") ? ":" + p : "") + w.pathname;
    }
}

function getCheckVal(id) {
    var check = $("#" + id);
    if (check.is(":checked")) {
        return encodeURIComponent(check.val());
    } else {
        return "";
    }
}

function getCheckValGroup(groupName) {
    var vals = "";
    $("input[name='" + groupName + "']:checked").each(function () {
        vals += vals ? "," + $(this).val() : $(this).val();
    });
    return vals;
}

function getRadioVal(groupName) {
    return encodeURIComponent($("input[name='" + groupName + "']:checked").val());
}

function disableButton(id, text) {
    var btn = $("#" + id);
    btn.attr("data-orig-text", btn.html());
    btn.html(text);
    btn.attr("disabled", "disabled").addClass("disabled");
}

function reenableButton(id) {
    var btn = $("#" + id);
    btn.html(btn.attr("data-orig-text"));
    btn.removeAttr("data-orig-text").removeAttr("disabled").removeClass("disabled");
}

function getSecToken() {
    return encodeURIComponent($("input[name=__RequestVerificationToken]").val());
}

function getSecTokenRaw() {
    return $("input[name=__RequestVerificationToken]").val();
}

function serializeSecToken(onlyParameter) {
    if (onlyParameter == true) {
        return "__RequestVerificationToken=" + getSecToken();
    } else {
        return "&__RequestVerificationToken=" + getSecToken();
    }
}

function handleResponseError(resp) {
    isAdmin = (window.location.toString().indexOf("/admin") > -1) ? true : false;
    if (resp.errType) {
        window.location = ((isAdmin) ? "/admin" : "") + "/error/?err=" + resp.errType;
    } else if (resp.redirect) {
        window.location = resp.redirect;
    }
}

function formObj() {
    var button, disabledText, service, data, callback, resp;
    var formRedirects = false;
    var isAdmin = false;
    var timeout = 90000;
    var checkButtonVisibility = true;
    this.onStart = function () {
        disableButton(this.button, this.disabledText);
    };
    this.reenableForm = function () {
        reenableButton(this.button);
    };
    this.clearFields = function () {
        $("#" + this.button).closest("form").find("input").each(function () {
            var field = $(this);
            field.val("");
            if (field.attr("type") == "password") {
                var tempField = $("#" + field.attr("id") + "-temp");
                if (tempField.length > 0) {
                    field.hide();
                    tempField.show();
                }
            }
        });
    };
    this.onSuccess = function () {
        var resp = this.resp;
        if (resp.errType) {
            window.location = ((this.isAdmin) ? "/admin" : "") + "/error/?err=" + resp.errType;
        } else if (resp.redirect) {
            window.location = resp.redirect;
        } else {
            this.callback(resp);
        }
        if (resp.IsValid) {
            if (!this.formRedirects) {
                this.reenableForm();
            }
            unhideCode(this.button);
            if (!resp.Data || (resp.Data && !resp.Data.overrideReset == true)) resetAction(this.button);
        } else {
            this.reenableForm();
        }
        return false;
    }
    this.initForm = function (confirmMsg) {
        var f = this;
        $("#" + f.button).click(function (e) {
            if (!$(this).is(":visible") && f.checkButtonVisibility) {
                return false;
            }
            if (confirmMsg && !confirm(confirmMsg)) {
                return false;
            }
            try {
                removeFeedback();
                f.onStart();
                $.ajax({
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    url: f.service,
                    data: f.data() + serializeSecToken(),
                    timeout: f.timeout,
                    success: function (resp) {
                        f.resp = resp;
                        f.onSuccess();
                    },
                    error: function (e) {
                        alert("An error occurred");
                        f.reenableForm();
                    }
                });
                return false;
            } catch (err) {
                f.reenableForm();
                return false;
            }
        });
    };
}

function showPopover(id, msg, altid, altid2) {
    var el = $("#" + id);
    if (altid && !el.is(":visible")) el = $("#" + altid);
    if (altid2 && !el.is(":visible")) el = $("#" + altid2);
    var current = el.data("popover");
    if (current) {
        current.$tip.find(".content p").html(msg);
        current.$tip.show();
    } else {
        el.popover({
            content: msg,
            trigger: "manual"
        });
        el.popover("show");
        if (window.pageYOffset > 0) {
            var tip = el.data("popover").$tip
            var top = parseInt(tip.css("top").replace("px", ""));
            top = top - window.pageYOffset;
            tip.css("top", top + "px");
        }
    }
}

function showAlert(msg, icon, type, idoverride) {
    if (!type) type = "alert-error";
    if (!icon) icon = "fas fa-times-circle mr-2";
    if (!idoverride) idoverride = "alert";

    $("#" + idoverride).after("<div class=\"alert " + type + "\"><i class=\"" + icon + "\"></i>&nbsp;" + msg + "</div>");
    window.location = "#";
}

function showValidationError(id, message, formid) {
    var field;
    if (arguments.length === 3) {
        var form = $("#" + formid + "");
        if (id == "service" && form.find("#btn-services-dropdown").length) { id = "btn-services-dropdown"; }
        field = form.find("#" + id + "");
    } else {
        field = $("#" + id + "");
    }

    if (document.location.href.indexOf("/admin/") > -1) {
        field.closest(".control-group").addClass("error");
        if (message) {
            field.after("<span class=\"help-inline\">" + message + "</span>");
            var controls = field.closest(".controls");
            controls.children(".code").hide();
        }
    } else {
        field.closest(".form-group").addClass("has-error");
        if (field.is("input")) {
            if (!field.is("input[type=hidden],input[type=checkbox]")) {
                if (field.closest(".form-group").length) {
                    field.closest(".form-group").addClass("has-feedback");
                    field.after("<span class='fal fa-exclamation-circle form-control-feedback' aria-hidden='true'></span>");
                }
            }
        }
    }
}

function fieldInvalid($inputField, valid) {
    var $parent = $inputField.closest(".form-group");
    if (!valid && !$parent.hasClass("has-error")) {
        $parent.addClass("has-error has-feedback");
        $inputField.after("<span class='fal fa-exclamation-circle form-control-feedback' aria-hidden='true'></span>");
    } else if (valid) {
        $parent.removeClass("has-error has-feedback");
        $parent.find(".form-control-feedback").remove();
    }
}

// admin only
function hideValidationError(id) {
    var field = $("#" + id + "");
    if (document.location.href.indexOf("/admin/") > -1) {
        field.closest(".control-group").removeClass("error");
        field.next(".help-inline").remove();
        field.closest(".controls").children(".code").show();
    }
}

function showValidationErrorField(id) {
    var field = $("#" + id + "");
    field.addClass("error");
}

function showUploaderValidationError(message) {
    var obj = $(".uploadify-button-text");
    obj.text(message);
    obj.css("color", "#B94A48");
    obj.closest(".control-group").addClass("error");
}

function showEditorValidationError(message, obj) {
    if (!obj) obj = $(".sun-editor");
    obj.css("border", "1px solid #B94A48");
    obj.closest(".control-group").addClass("error");
    if (message) obj.after("<span class=\"help-inline\">" + message + "</span>");
}

function showDateTimeValidationError(id, message) {
    var field = $("#" + id + "");
    if (field.length) {
        field.css("border", "1px solid #B94A48");
        field.closest(".control-group").addClass("error");
        if (message) field.closest(".form-group").append("<span class=\"help-inline\">" + message + "</span>");
    }
}

function unhideCode(formButton) {
    $("#" + formButton).closest("form").find(".code").show();
}

function resetAction(formButton) {
    $("#" + formButton).closest("form").find("input[id$='action']").val("edit");
}

function removeFeedback() {
    $(".uploadify-button-text").css("color", "#333333");
    $(".sun-editor").css("border", "1px solid #DDDDDD");
    $(".error").removeClass("error");
    $(".has-error").removeClass("has-error");
    $(".has-feedback").removeClass("has-feedback");
    $(".form-control-feedback").remove();
    $(".help-inline:not([class*='no-clear'])").remove();
    $(".help-block:not([class*='no-clear'])").remove();
    $(".alert:not([class*='no-clear'])").hide();
}

function getSafeHtml(id) {
    var html = $("#" + id).val();
    html = encodeURIComponent(html);
    html = html.replace(/%/g, '~');
    return html;
}

function convertSafeHtml(html) {
    html = encodeURIComponent(html);
    html = html.replace(/%/g, '~');
    return html;
}

function decodeSafeHtml(html) {
    html = html.replace(/~/g, '%');
    html = decodeURIComponent(html);
    return html;
}

function isNumeric(value) {
    return !isNaN(parseFloat(value)) && isFinite(value);
}

function trim(text, char) {
    while (text.substring(0, 1) == char) {
        text = text.substring(1);
    }
    while (text.substring(text.length - 1) == char) {
        text = text.substring(0, text.length - 1);
    }
    return text;
}

jQuery.fn.extend({
    addToList: function (value, delim) {
        return this.filter(":input").val(function (i, v) {
            if (value == "" || value == null || value == undefined) return v;
            if (v == "") {
                return value;
            } else {
                var arr = v.split(delim);
                arr.push(value);
                return arr.join(delim);
            }
        }).end();
    },
    removeFromList: function (value, delim) {
        return this.filter(":input").val(function (i, v) {
            if (value == "" || value == null || value == undefined) return v;
            return $.grep(v.split(delim), function (val) {
                return val != value;
            }).join(delim);
        }).end();
    }
});


function isHTML5UploadEnabled() {
    return typeof window.FormData !== 'undefined';
}

function initUpload(uploadControl, uploadSuccessCallback, uploadLimitCallback) {
    var fileuploaders = (uploadControl ? $(uploadControl) : $(".file-upload"));
    if (fileuploaders.length > 0) {
        fileuploaders.each(function (idx, el) {
            var uploader = $(el);
            var uploaderId = uploader.attr("id");
            if (!uploaderId) {
                uploaderId = "file-upload-" + idx;
                uploader.attr("id", uploaderId);
            }
            var form = uploader.closest("form");
            var queueId = uploader.attr("id") + "-queue";
            var queue = form.find(".file-upload-queue").attr("id", queueId);
            var queueExists = (queue.length > 0) ? true : false;
            var thumbnailId = uploader.attr("id") + "-thumbnail";
            var fileId = uploader.attr("id") + "-file";
            var thumbnail = $("#" + thumbnailId).length ? $("#" + thumbnailId) : uploader.parent().find(".file-upload-thumbnail").attr("id", thumbnailId);
            var thumbnailExists = (thumbnail.length > 0) ? true : false;
            var sizeLimit = uploader.attr("data-size-limit");
            var fileLimit = parseInt(uploader.attr("data-file-limit"));
            var buttonClass = uploader.attr("data-button-class");
            var buttonText = uploader.attr("data-button-text");
            var uploaderPath = uploader.attr("data-uploader-path");
            var fileTypeDesc = uploader.attr("data-filetype-desc");
            var fileTypeExts = uploader.attr("data-filetype-exts");
            var redirect = uploader.attr("data-redirect");
            var noreenable = uploader.attr("data-no-reenable");
            var lastFile;
            if (thumbnail.length && thumbnail.attr("src") == "") {
                thumbnail.hide();
            }

            uploader.hide();

            function getToken() {
                var token;
                $.ajax({
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    async: false,
                    url: "/ws/file/upload-token/",
                    data: serializeSecToken(),
                    success: function (resp) {
                        if (resp.Ok) {
                            token = resp.token;
                        } else {
                            handleResponseError(resp);
                        }
                    },
                    error: function () {
                        alert("An error occurred");
                    }
                });
                return token;
            }

            var errorCount = 0;
            function writeError(msg) {
                errorCount++;
                if (queueExists) {
                    var randId = Math.random().toString(36).substring(2);
                    queue.append("<div id=\"Err_" + randId + "\" class=\"alert alert-error\" style=\"margin-bottom: 5px; line-height: 150%\">" + msg + "</div>");
                    setTimeout(function () {
                        queue.find("#Err_" + randId).fadeOut("fast", function () {
                            $(this).remove();
                        });
                    }, 5000);
                } else {
                    alert(msg);
                }
            }

            if (isHTML5UploadEnabled()) {

                var uploaderBtn = $(".uploader-btn[for='" + uploaderId + "']");
                if (uploaderBtn.length === 0) {
                    uploader.after("<label for='" + uploaderId + "' class='uploader-btn " + buttonClass + "'>" + buttonText + "</label>");
                    uploaderBtn = $(".uploader-btn[for='" + uploaderId + "']");
                }

                if (fileLimit > 1) {
                    uploader.attr("multiple", "multiple");
                }

                if (fileTypeExts) {
                    uploader.attr("accept", fileTypeExts.replace(/\*/g, "").replace(/\;/g, ","));
                }

                var uploadLimit = function () {
                    var reachedUploadLimit = false;
                    if (uploadLimitCallback && typeof (uploadLimitCallback) === "function") {
                        reachedUploadLimit = uploadLimitCallback();
                        if (!reachedUploadLimit) {
                            uploaderBtn.removeClass("disabled");
                        }
                    }
                    if (reachedUploadLimit) {
                        uploaderBtn.text(buttonText);
                        uploaderBtn.addClass("disabled");
                    }
                    return reachedUploadLimit;
                }

                function reenable() {
                    uploaderBtn.text(buttonText);
                    if (!uploadLimit()) {
                        uploaderBtn.removeClass("disabled");
                    }
                }

                uploadLimit();

                uploader.on("change",
                    function (evt) {

                        if (uploadLimit()) return;

                        var files = evt.target.files;
                        uploaderBtn.addClass("disabled");
                        uploaderBtn.text("Uploading...");

                        var allowedFileTypes = "";
                        if (uploader[0].hasAttribute("data-filetype-exts")) {
                            allowedFileTypes = uploader.attr("data-filetype-exts").replace(/\*/g, '').split(';').filter(element => element);
                        }

                        var fileIdx = 0;
                        var filesUploaded = 0;
                        var filesToUpload = 0;
                        $.each(files,
                            function (key, value) {
                                if (uploadLimit()) return;
                                var file = files[fileIdx++];
                                var formdata = new FormData();
                                var allowFileUpload = 0;

                                if (allowedFileTypes !== "undefined" && allowedFileTypes !== "" && allowedFileTypes.length > 0) {
                                    var extension = file.name.substr((file.name.lastIndexOf('.')));
                                    allowFileUpload = $.inArray(extension, allowedFileTypes);
                                }

                                if (allowFileUpload >= 0) {
                                    if (sizeLimit === "" || file.size < (sizeLimit * 1024 * 1024)) {
                                        var token = getToken(function () { });
                                        formdata.append("token", token);
                                        formdata.append("fileId", fileId);
                                        formdata.append("Filename", file.name);
                                        formdata.append("Filedata", value);
                                        filesToUpload++;
                                        $.ajax({
                                            url: uploaderPath,
                                            enctype: 'multipart/form-data',
                                            type: 'POST',
                                            data: formdata,
                                            cache: false,
                                            processData: false,
                                            contentType: false,
                                            success: function (data) {
                                                if (typeof data.error === 'undefined') {
                                                    if (uploadSuccessCallback &&
                                                        typeof (uploadSuccessCallback) === "function") {
                                                        uploadSuccessCallback(uploader, file, data);
                                                    } else {
                                                        lastFile = file.name;
                                                        if (data === "error") {
                                                            writeError("An error occurred processing " + file.name);
                                                        } else if (data === "size-error") {
                                                            writeError('Incorrect file size(W X H) used.');
                                                        } else if (thumbnailExists) {
                                                            thumbnail.attr("src",
                                                                uploader.attr("data-thumbnail-url") + data);
                                                            thumbnail.attr("data-filename", data);
                                                            thumbnail.show();
                                                        } else if (fileId) {
                                                            $("#" + fileId).attr("data-filename", data);
                                                            if ($("#" + fileId).is("a")) {
                                                                $("#" + fileId).attr("href", uploader.attr("data-thumbnail-url") + data);
                                                                $("#" + fileId).show();
                                                                $('#' + fileId + '-delete').show();
                                                            }
                                                        }
                                                    }

                                                    uploadLimit();
                                                } else {
                                                    writeError("An error occurred processing " + file.name);
                                                }
                                                filesUploaded++;
                                            },
                                            error: function () {
                                                writeError("An error occurred processing " + file.name);
                                            }
                                        });
                                    } else {
                                        alert(file.name + " Exceeds file size limit " + sizeLimit + " MB.");
                                    }
                                } else {
                                    alert(file.name + " not allowed. Please use following file types: " + allowedFileTypes);
                                }
                            });

                        var checkFilesUploaded = setInterval(function () {
                            if (filesToUpload === filesUploaded) {
                                clearInterval(checkFilesUploaded);
                                if (redirect && redirect !== "") {
                                    if (redirect.indexOf("{lastFile}") > -1) {
                                        if (lastFile) {
                                            redirect = redirect.replace("{lastFile}", encodeURIComponent(lastFile));
                                        } else {
                                            redirect = "";
                                        }
                                    }
                                    window.location = redirect;
                                } else {
                                    reenable();
                                }
                            }
                        }, 1000);
                        uploader.val('');
                    });
            } else {

                function reenable() {
                    uploader.uploadify("settings", "buttonText", buttonText);
                    uploader.uploadify("settings", "buttonClass", buttonClass);
                    uploader.uploadify("disable", false);
                }

                uploader.uploadify({
                    "buttonClass": buttonClass,
                    "width": 190,
                    "height": 34,
                    "buttonText": buttonText,
                    "progressData": "percentage",
                    "swf": "/js/lib/uploadify.swf",
                    "uploader": uploaderPath,
                    "queueID": (!queueExists) ? false : queueId,
                    "auto": true,
                    "fileTypeDesc": fileTypeDesc,
                    "fileTypeExts": fileTypeExts,
                    "queueSizeLimit": fileLimit,
                    "multi": (fileLimit > 1) ? true : false,
                    "fileSizeLimit": sizeLimit + "MB",
                    "removeTimeout": 1,
                    "successTimeout": 180,
                    "overrideEvents": ["onDialogClose"],
                    "itemTemplate": (!queueExists) ? null : "<div id=\"${fileID}\" class=\"alert alert-success\" style=\"margin-bottom: 5px; line-height: 150%\"><button type=\"button\" class=\"close\" onclick=\"$('#${instanceID}').uploadify('cancel', '${fileID}')\">&#215;</button><span class=\"fileName\">${fileName} (${fileSize})</span><span class=\"data\"></span></div>",
                    "onFallback": function () {
                        writeError("You need Flash installed to upload files");
                    },
                    "onUploadSuccess": function (file, data) {
                        if (uploadSuccessCallback && typeof (uploadSuccessCallback) === "function") {
                            uploadSuccessCallback(uploader, file, data);
                        } else {
                            lastFile = file.name;
                            if (data === "error") {
                                writeError("An error occurred processing " + file.name);
                            } else if (thumbnailExists) {
                                thumbnail.attr("src", uploader.attr("data-thumbnail-url") + data);
                                thumbnail.attr("data-filename", data);
                                thumbnail.show();
                                uploader.trigger("uploaded", data);
                            } else if (fileId) {
                                $("#" + fileId).data("data-filename", data);
                                uploader.trigger("uploaded", data);
                            }
                        }
                    },
                    "onUploadStart": function (file) {
                        var reachedUploadLimit = false;
                        if (uploadLimitCallback && typeof (uploadLimitCallback) === "function") {
                            reachedUploadLimit = uploadLimitCallback();
                        }

                        if (!reachedUploadLimit) {
                            var token = getToken();
                            uploader.uploadify("settings", "formData", { "token": token, "fileId": fileId });
                            uploader.uploadify("settings", "buttonText", "Uploading...");
                            uploader.uploadify("settings", "buttonClass", buttonClass + " disabled");
                            uploader.uploadify("disable", true);
                        }
                    },
                    "onQueueComplete": function () {
                        if (noreenable != "true") {
                            reenable();
                        }
                        if (uploadLimitCallback && typeof (uploadLimitCallback) === "function") {
                            if (uploadLimitCallback()) {
                                uploader.uploadify("disable", true);
                            }
                        }
                    },
                    "onDialogClose": function (queueData) {
                        if (queueData.filesErrored > 0) {
                            writeError(queueData.errorMsg);
                        };
                        if (queueExists && redirect) {
                            var int = setInterval(function () {
                                var uploadMgsCount = queue.find("div[id^='SWFUpload']").length;
                                var errorMgsCount = queue.find("div[id^='Err_']").length;
                                if (uploadMgsCount == 0 && errorMgsCount == 0) {
                                    clearInterval(int);
                                    if (redirect.indexOf("{lastFile}") > -1) {
                                        if (lastFile) {
                                            redirect = redirect.replace("{lastFile}", encodeURIComponent(lastFile));
                                        } else {
                                            redirect = "";
                                        }
                                    }
                                    if (redirect != "" && errorCount == 0) {
                                        window.location = redirect;
                                    } else {
                                        reenable();
                                    }
                                }
                            }, 100);
                        }
                        return false;
                    },
                    "onSWFReady": function () {
                        if (uploadLimitCallback && typeof (uploadLimitCallback) === "function") {
                            if (uploadLimitCallback()) {
                                uploader.uploadify("disable", true);
                            }
                        }
                    }
                });
            }
        });
    }
}

function getCombinedAlert(data) {
    var msg = "";
    for (var i in data.ErrFields) {
        msg += ((msg == "") ? "* " : "\n* ") + data.ErrFields[i].replace(/^\*/, "");
    }
    return msg;
}

var submitText = "<i class='far fa-circle-notch fa-spin'></i> Submitting..."

var trackOutboundLink = function (category, eventname, url) {
    if (typeof ga != "undefined") {
        ga('send', 'event', category, eventname, url);
    }
}

function isIE() {
    var undef, rv = -1;
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    } else if (trident > 0) {
        var rvNum = ua.indexOf('rv:');
        rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
    }

    return ((rv > -1) ? rv : undef);
}

function googleAutoComplete(form, fieldName, type, hiddenPrefix) {

    var field = form.find(fieldName);
    if (field) {

        var gkey = getGoogleMapsAPIKey();

        if (type === undefined || type === null || type === '')
            type = 'address';

        if (hiddenPrefix === undefined || hiddenPrefix === null || hiddenPrefix === '')
            hiddenPrefix = '';

        $.getScript("https://maps.googleapis.com/maps/api/js?key=" + gkey + "&libraries=places", function (script) {
            var autocomplete = new window.google.maps.places.Autocomplete(field.get(0), { types: [type] });
            autocomplete.setComponentRestrictions({ country: ["us", "ca"] });
            autocomplete.addListener('place_changed', function (e) {
                var place = autocomplete.getPlace();
                field.val(place.formatted_address);
                field.attr("data-place-id", place.place_id);
                populateAddressHiddenFields(place.formatted_address, place.place_id, type, hiddenPrefix);
            });

            var checkForAutocomplete = function () {
                if ($(fieldName).attr("autocomplete") === "off") {
                    $(fieldName).attr("autocomplete", "none");
                }
                else {
                    setTimeout(checkForAutocomplete, 100);
                }
            }
            checkForAutocomplete();

            $(window).load(function () { $(fieldName).attr("autocomplete", "none") });

            field.on("focusout", function (e) {
                var value = $(this).val();
                var id = $(this).attr("data-place-id");
                populateAddressHiddenFields(value, id, type, hiddenPrefix);
            });
        });
    }
}

function parseGoogleAddress(matchedaddress) {
    var address_components = (matchedaddress ? matchedaddress.address_components : null);
    var partialMatch = (matchedaddress ? matchedaddress.partial_match === true ? true : false : false);
    this.address1 = "";
    this.address2 = "";
    this.city = "";
    this.longcity = "";
    this.neighborhood = "";
    this.state = "";
    this.county = "";
    this.township = "";
    this.zip = "";
    this.country = "";
    this.latitude = "";
    this.longitude = "";
    this.formatted_address = "";
    if (address_components && partialMatch === false) {
        for (var i = 0; i < address_components.length; i++) {
            var addressType = address_components[i].types[0];
            if (addressType === "street_number") {
                this.address1 = address_components[i]['short_name'];
            } else if (addressType === "route") {
                this.address1 += " " + address_components[i]['short_name'];
            } else if (addressType === "locality") {
                this.city = address_components[i]['short_name'];
                this.longcity = address_components[i]['long_name'];
            } else if (addressType === "administrative_area_level_1") {
                this.state = address_components[i]['short_name'];
            } else if (addressType === "administrative_area_level_2") {
                this.county = address_components[i]['short_name'];
            } else if (addressType === "administrative_area_level_3") {
                this.township = address_components[i]['short_name'];
            } else if (addressType === "postal_code") {
                this.zip = address_components[i]['short_name'];
            } else if (addressType === "country") {
                this.country = address_components[i]['short_name'];
                if (this.country === "US") this.country = "USA";
            } else if (addressType === "subpremise") {
                this.address2 = address_components[i]['short_name'];
            } else if (addressType === "neighborhood") {
                this.neighborhood = address_components[i]['short_name'];
            }
        }

        if (this.city === "") {
            if (this.neighborhood !== "") {
                this.city = this.neighborhood;
            }
            else if (this.township !== "") {
                this.city = this.township;
            }
        }

        this.formatted_address = matchedaddress.formatted_address;

        this.latitude = matchedaddress.geometry.location.lat();
        this.longitude = matchedaddress.geometry.location.lng();
    }
}

function bestMatchedGoogleAddress(results) {
    var result = (results.length > 0 ? results[0] : null);
    if (results.length > 1) {
        $.each(results, function (i) {

            var componentsArr = new Array();
            results[i].address_components.findIndex(function (entry) {
                if (entry.types.indexOf("street_number") > -1) {
                    componentsArr.push("street_number");
                } else if (entry.types.indexOf("route") > -1) {
                    componentsArr.push("route");
                } else if (entry.types.indexOf("locality") > -1) {
                    componentsArr.push("locality");
                } else if (entry.types.indexOf("administrative_area_level_1") > -1) {
                    componentsArr.push("administrative_area_level_1");
                } else if (entry.types.indexOf("postal_code") > -1) {
                    componentsArr.push("postal_code");
                } else if (entry.types.indexOf("country") > -1) {
                    componentsArr.push("country");
                }
            });

            if (componentsArr.includes("street_number") && componentsArr.includes("route") && componentsArr.includes("locality")
                && componentsArr.includes("administrative_area_level_1") && componentsArr.includes("postal_code") && componentsArr.includes("country")) {
                result = results[i];
                return false;
            }
        });
    }
    return result;
}

function populateAddressHiddenFields(address, id, type, hiddenPrefix, callback) {

    if (type === undefined || type === null || type === '')
        type = 'address';

    if (hiddenPrefix === undefined || hiddenPrefix === null || hiddenPrefix === '')
        hiddenPrefix = '';

    if (id === undefined || id === null)
        id = '';

    var clearHiddenFields = function (type) {
        if (type === "address") {
            $("#g-" + hiddenPrefix + "address1").val("");
            $("#g-" + hiddenPrefix + "address2").val("");
            $("#g-" + hiddenPrefix + "city").val("");
            $("#g-" + hiddenPrefix + "state").val("");
            $("#g-" + hiddenPrefix + "zip").val("");
            $("#g-" + hiddenPrefix + "country").val("");
            $("#g-" + hiddenPrefix + "latitude").val("");
            $("#g-" + hiddenPrefix + "longitude").val("");

            if ($("#g-" + hiddenPrefix + "neighborhood").length) {
                $("#g-" + hiddenPrefix + "neighborhood").val("");
            }

            if ($("#g-" + hiddenPrefix + "fromcity").length) {
                $("#g-" + hiddenPrefix + "fromcity").val("");
            }

            if ($("#g-" + hiddenPrefix + "fromstate").length) {
                $("#g-" + hiddenPrefix + "fromstate").val("");
            }

            if ($("#g-" + hiddenPrefix + "fromzip").length) {
                $("#g-" + hiddenPrefix + "fromzip").val("");
            }

            if ($("#g-" + hiddenPrefix + "county").length) {
                $("#g-" + hiddenPrefix + "county").val("");
            }
        } else if (type === "(regions)") {
            $("#g-" + hiddenPrefix + "tocity").val("");
            $("#g-" + hiddenPrefix + "tostate").val("");
            $("#g-" + hiddenPrefix + "tozip").val("");
            $("#g-" + hiddenPrefix + "tocountry").val("");
        }
    }

    if (address === "") {
        clearHiddenFields(type);
        return;
    }

    if (id === "") {
        if (callback !== undefined) {
            callback();
            return;
        } else {
            return;
        }
    }

    var geocoder = new window.google.maps.Geocoder();
    geocoder.geocode({ placeId: id }, function (results, status) {
        if (status === "OK") {
            if (type === '(regions)') {
                // Zip
                var matchedRegions = (results.length > 0 ? results[0] : null);
                var region = new parseGoogleAddress(matchedRegions);
                if (region.formatted_address !== "") {
                    var validMatch = true;

                    if (address.toLowerCase().includes(region.city.toLowerCase())) {
                        $(`#g-${hiddenPrefix}tocity`).val(region.city);
                    }
                    else if (address.toLowerCase().includes(region.longcity.toLowerCase())) {
                        $(`#g-${hiddenPrefix}tocity`).val(region.city);
                    }
                    else {
                        validMatch = false;
                    }

                    if (address.toLowerCase().includes(region.state.toLowerCase())) {
                        $(`#g-${hiddenPrefix}tostate`).val(region.state);
                    } else {
                        validMatch = false;
                    }

                    if (address.toLowerCase().includes(region.zip)) {
                        $(`#g-${hiddenPrefix}tozip`).val(region.zip);
                    } else {
                        validMatch = false;
                    }

                    if (address.toLowerCase().includes(region.country.toLowerCase())) {
                        $(`#g-${hiddenPrefix}tocountry`).val(region.country);
                    } else {
                        validMatch = false;
                    }

                    if (!validMatch) {
                        clearHiddenFields(type);
                    }
                } else {
                    clearHiddenFields(type);
                }
            } else {
                // Full Address
                var matchedaddress = bestMatchedGoogleAddress(results);
                var parsedAddress = new parseGoogleAddress(matchedaddress);
                if (parsedAddress.formatted_address !== "") {
                    var validMatch = true;

                    $(`#g-${hiddenPrefix}address1`).val(parsedAddress.address1);
                    $(`#g-${hiddenPrefix}address2`).val(parsedAddress.address2);
                    $(`#g-${hiddenPrefix}city`).val(parsedAddress.city);
                    $(`#g-${hiddenPrefix}neighborhood`).val(parsedAddress.neighborhood);

                    if (address.toLowerCase().includes(parsedAddress.state.toLowerCase())) {
                        $(`#g-${hiddenPrefix}state`).val(parsedAddress.state);
                    } else {
                        validMatch = false;
                    }

                    if (address.toLowerCase().includes(parsedAddress.zip.toLowerCase())) {
                        $(`#g-${hiddenPrefix}zip`).val(parsedAddress.zip);
                    } else {
                        validMatch = false;
                    }

                    if (address.toLowerCase().includes(parsedAddress.country.toLowerCase())) {
                        $(`#g-${hiddenPrefix}country`).val(parsedAddress.country);
                    } else {
                        validMatch = false;
                    }

                    $(`#g-${hiddenPrefix}latitude`).val(parsedAddress.latitude);
                    $(`#g-${hiddenPrefix}longitude`).val(parsedAddress.longitude);
                    $(`#g-${hiddenPrefix}fromcity`).val(parsedAddress.city);
                    $(`#g-${hiddenPrefix}fromstate`).val(parsedAddress.state);
                    $(`#g-${hiddenPrefix}fromzip`).val(parsedAddress.zip);
                    $(`#g-${hiddenPrefix}county`).val(parsedAddress.county);

                    if (!validMatch) {
                        clearHiddenFields(type);
                    }
                } else {
                    clearHiddenFields(type);
                }
            }
        } else {
            clearHiddenFields(type);
        }

        if (callback !== undefined)
            callback();
    });
}

function checkWebNotificationPermission() {
    if (!("Notification" in window)) {
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission();
    }
}


function checkIfWebNotificationExists(id) {
    var result = false;
    if ($.lstWebNotification) {
        result = ($.lstWebNotification.map(function (item) { return item.id; }).indexOf(id) > -1);
    }
    return result;
}

function removeWebNotificationFromList(id) {
    if ($.lstWebNotification) {
        var removeIndex = $.lstWebNotification.map(function (item) { return item.id; }).indexOf(id);
        $.lstWebNotification.splice(removeIndex, 1);
    }
}

function closeWebNotification(id) {
    if (checkIfWebNotificationExists(id)) {
        if ($.lstWebNotification) {
            $.each(lstWebNotification, function (i, el) {
                if (el.id == id) {
                    el.notification.close();
                }
            });
        }
    }
}

function showWebNotification(id, title, message, icon, action, timeout) {
    var notified = false;
    if (!("Notification" in window)) {
        notified = false;
    } else if (Notification.permission === "granted") {
        showNotification(id, title, message, icon, action);
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
                showNotification(id, title, message, icon, action);
            }
        });
    }

    function showNotification(id, title, message, icon, action) {
        notified = true;
        if (checkIfWebNotificationExists(id)) return;
        var notification = new Notification(title, { body: message, icon: icon, requireInteraction: true, tag: id });
        if (action && typeof (action) === "function") {
            notification.onclick = function (event) {
                action();
            };
        }
        if (timeout) {
            setTimeout(function () { notification.close(); }, timeout);
        }
        if (!$.lstWebNotification) $.lstWebNotification = new Array();
        $.lstWebNotification.push({ id: id, notification: notification });
        notification.onclose = function (event) {
            removeWebNotificationFromList(id);
        };
    }
    return notified;
}

function getGoogleMapsAPIKey() {
    var gkey = ""
    $.ajax({
        type: "POST",
        cache: false,
        dataType: "json",
        async: false,
        url: "/ws/googlemaps-apikey/",
        data: serializeSecToken(),
        success: function (data) {
            gkey = data;
        }
    });
    return gkey;
}

String.prototype.format = function () {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function (match, number) {
        return typeof args[number] != 'undefined'
            ? args[number]
            : match
            ;
    });
};

function UpdateQueryString(key, value, url) {
    if (!url) url = window.location.href;
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)(.*)", "gi"),
        hash;

    if (re.test(url)) {
        if (typeof value !== 'undefined' && value !== null) {
            return url.replace(re, '$1' + key + "=" + value + '$2$3');
        }
        else {
            hash = url.split('#');
            url = hash[0].replace(re, '$1$3').replace(/(&|\?)$/, '');
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                url += '#' + hash[1];
            }
            return url;
        }
    }
    else {
        if (typeof value !== 'undefined' && value !== null) {
            var separator = url.indexOf('?') !== -1 ? '&' : '?';
            hash = url.split('#');
            url = hash[0] + separator + key + '=' + value;
            if (typeof hash[1] !== 'undefined' && hash[1] !== null) {
                url += '#' + hash[1];
            }
            return url;
        }
        else {
            return url;
        }
    }
}

function addParameterToURL(param) {
    _url = location.href;
    _url += (_url.split('?')[1] ? '&' : '?') + param;
    return _url;
}

function GenerateGUID() {
    var d = new Date().getTime();

    var guid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = (d + Math.random() * 16) % 16 | 0;
        d = Math.floor(d / 16);

        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });

    return guid;
}

function getUrlParameter(sParam) {
    const sPageURL = window.location.search.substring(1);
    const sURLVariables = sPageURL.split("&");
    var sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split("=");

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }

    return null;
}

function initCharCounter() {
    $.each($(".char-counter"), function (i, v) {
        var $t = $(v);
        var inputId = $t.attr("data-input-id");
        var count = $t.attr("data-count");

        if (inputId !== "" && count !== "") {
            var $input = $("#" + inputId);
            if ($input.length) {
                $input.attr("maxlength", count);

                $t.html($input.val().length);

                $input.on("keyup", function () {
                    $t.html($(this).val().length);
                });
            }
        }
    });
}

function initValidateFields() {
    var formNames = $('input[name="form"]');
    if (formNames.length) {
        $.each(formNames, function (i, formName) {
            $.post("/ws/form-check-validation/", { formName: formName.value }, function (validateOnInput) {
                if (validateOnInput) {

                    var $form = $(formName.closest('form'));
                    if (!$form.length) return false;

                    $form.on('focusout validate', ':input', function (e) {
                        // Slight delay to prevent blinking for longer running actions
                        // i.e google autocomplete field

                        var $inputField = $(this);
                        setTimeout(function () {
                            if ($inputField.attr('type') === 'file' && e.type === "focusout") return false;

                            var formData = new FormData();
                            $.each($form.serializeArray(), function (i, v) {
                                formData.append(v.name, v.value);
                            });
                            if ($form.find("input[type='file']").length) {
                                var fileUpload = $form.find("input[type='file']");
                                $.each($(fileUpload)[0].files, function (i, file) {
                                    formData.append($(fileUpload)[0].name, file);
                                });

                                var filename = $.map($(fileUpload)[0].files, function (file, i) {
                                    return file.name;
                                }).join(",");

                                formData.append("filename", filename);
                            }
                            if ($(".form-selected-service:checked").length) {
                                var services = [];
                                $.each($(".form-selected-service:checked"), function (i, file) {
                                    services.push($(this).val());
                                });
                                formData.append("service", services);
                            }
                            formData.append("fieldName", $inputField.attr('name'));
                            formData.append("formName", formName.value);

                            $.ajax({
                                type: "POST",
                                cache: false,
                                dataType: "json",
                                url: "/ws/form-validate-field/",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (valid) {
                                    fieldInvalid($inputField, valid);
                                }
                            });
                        }, 450);
                    });
                }
            });
        });
    }
}

function initRatings() {
    $(".rating-selector").each(function (idx) {
        var ratingID = $(this).attr("id");
        ratingID = (ratingID) ? ratingID + "-value" : "rating-hidden-" + (idx + 1);
        if ($("#" + ratingID).length <= 0) {
            var ratingValue = 0;
            $(this).find("a").each(function () {
                if ($(this).hasClass("yes-value")) {
                    ratingValue++;
                }
            });
            $(this).append("<input id=\"" + ratingID + "\" name=\"" + ratingID + "\" type=\"hidden\" value=\"" + ratingValue + "\"/>");
        }

        $(this).find("a").each(
            function () {
                $(this).on("click", function () {
                    $(this).siblings("a").removeClass("yes-value");
                    $(this).nextAll("a").addClass("yes-value");
                    $(this).addClass("yes-value");
                    var rating = (5 - $(this).index());
                    $("#" + ratingID).val(rating);
                });
            });
        $(this).on("mouseenter", function () {
            $(this).find("a").removeClass("yes-value");
        });
        $(this).on("mouseleave", function () {
            var rating = $("#" + ratingID).val();
            $(this).find("a").each(function (idx, a) {
                if (idx >= (5 - rating) && rating != 0)
                    $(a).addClass("yes-value");
            });
        });
    });
}

function initLazy() {
    if ($(".lazyload").length) {
        $(window).on("scroll", function () {
            loadImg();
        });
        loadImg();
        function loadImg() {
            var inView = $(window).scrollTop() + $(window).height();
            $(".lazyload").each(function () {
                var y = $(this).offset().top;
                var src = $(this).attr("data-src");
                if (inView > y) {
                    $(this).removeClass("lazyload").attr("src", src).removeAttr("data-src");
                }
            });
        };
    }
}

function initMultiSelection() {
    $(".services-dropdown-menu input").on("change", function () {
        var selected = [];
        $(".form-selected-service:checked").each(function () {
            selected.push("<span class='badge'>" + $(this).val() + "</span>");
        });
        if (selected.length) {
            $("#btn-services-dropdown div").html(selected);
        } else {
            $("#btn-services-dropdown div").html("Project Type");
        }
    });
    $(".services-dropdown-menu input").trigger("change");
    $(".services-dropdown-menu").on("click", function (e) {
        e.stopPropagation();
    });
}
(function ($) {
    $.fn.formUploader = function () {
        var $form = $(this);
        var $uploader = $form.find("input[type='file']");

        if ($uploader.length) {
            var dialogOpen = false;
            var multiple = $uploader.prop("multiple") ? true : false; // we explicitly set as attr can return 'undefined', NaN, 0, etc.
            var maxSize = parseInt($uploader.data("size-limit"));
            var sizeType = $uploader.data("size-type");

            var maxSizeBytes = (maxSize * 1024);
            if (sizeType.toLowerCase() === "mb") maxSizeBytes *= 1024;

            if (!multiple) {
                $uploader.click(function (e) {
                    if ($form.find(".button-style").hasClass("hide")) {
                        e.preventDefault();

                        return false;
                    }

                    dialogOpen = true;

                    window.addEventListener('touchstart', fileCheck, { once: true });

                    $form.find(".upload-text").text("Loading...");
                    $form.find(".button-style").html(loadingTemplate);
                });

                $uploader.change(fileCheck);

                $uploader.focus(function () {
                    if (dialogOpen) {
                        dialogOpen = false;

                        $form.find(".upload-text").text("Choose File");
                        $form.find(".button-style").text("Browse");
                    }
                });

                $form.find(".link-remove-upload").click(function (e) {
                    e.preventDefault();

                    var files = $uploader[0].files;
                    var file = files[0];

                    if (validImageMimes.includes(file.type)) {
                        var $img = $form.find(".img-uploaded");
                        $img.prop("src", "");
                        $img.addClass("hide");
                    } else {
                        $form.find(".file-type").addClass("hide");
                    }

                    $uploader[0].value = null;

                    $form.find(".upload-text").text("Choose File");
                    $form.find(".button-style").removeClass("hide");

                    $(this).addClass("hide");

                    $($uploader[0]).trigger('change');

                    return false;
                });

                function fileCheck() {
                    dialogOpen = false;

                    var files = $uploader[0].files;
                    var file = files[0];

                    if (file === undefined) {
                        $form.find(".upload-text").text("Choose File");
                        $form.find(".button-style").text("Browse");

                        return false;
                    }

                    if (file.size > maxSizeBytes) {
                        $form.find(".upload-text").text("Choose File");
                        $form.find(".button-style").text("Browse");

                        $uploader[0].value = null;

                        alert(file.name + " is larger than " + maxSize + sizeType);

                        return false;
                    }

                    $form.find(".upload-text").text(file.name);
                    $form.find(".button-style").addClass("hide");
                    $form.find(".button-style").text("Browse");

                    var reader = new FileReader();
                    reader.addEventListener("load", function () {
                        if (validImageMimes.includes(file.type)) {
                            var img = $form.find(".img-uploaded");
                            $(img).prop("src", reader.result);
                            $(img).removeClass("hide");
                        } else {
                            $form.find(".file-type").removeClass("hide");
                        }

                        $form.find(".link-remove-upload").removeClass("hide");
                    }, false);

                    reader.readAsDataURL(file);
                }
            } else {
                var $filesContainer = $form.find(".uploads-list");

                //we use this to keep track of the files being add/removed via input
                //when clicking "Choose Files" more than once you essentially "reset" which files are uploaded
                //so we use a DataTransfer object to help keep track
                const dt = new DataTransfer();

                $uploader.change(function (e) {
                    var files = $uploader[0].files;

                    var copyLimit = files.length;

                    var filesToLarge = $.map(files, function (file, i) {
                        if (file.size > maxSizeBytes) {
                            return file;
                        }
                    });

                    copyLimit -= filesToLarge.length;

                    if (filesToLarge.length) {
                        var error = $.map(filesToLarge, function (file, i) {
                            return file.name + " is larger than " + maxSize + sizeType;
                        }).join("\n");

                        alert(error);
                    }

                    var validFiles = $.map(files, function (file, i) {
                        if (file.size <= maxSizeBytes) {
                            return file;
                        }
                    });

                    if ($uploader.data("file-limit")) {
                        var limit = parseInt($uploader.data("file-limit"));
                        var currentNumFiles = $filesContainer.find(".uploaded-item").length;
                        var numAllowedFiles = limit - currentNumFiles;

                        if (validFiles.length >= numAllowedFiles) {
                            $uploader.prop("disabled", true);

                            copyLimit = numAllowedFiles;
                        }
                    }

                    var fileList = [];
                    for (var i = 0; i < copyLimit; i++) {
                        fileList.push(validFiles[i]);
                        dt.items.add(validFiles[i]);
                    }

                    $.each(fileList, function (i, v) {
                        var file = v;

                        var template = loadingMultipleTemplate.replace(/#index#/g, file.lastModified);
                        $filesContainer.append(template);

                        var reader = new FileReader();
                        reader.addEventListener("load", function () {
                            var $container = $form.find("#" + file.lastModified);

                            var template = null;
                            if (validImageMimes.includes(file.type)) {
                                template = imageTemplate.replace(/#url#/g, reader.result);
                            } else {
                                template = fileTemplate;
                            }

                            template = template.replace(/#filename#/g, file.name);
                            $container.html(template);
                        }, false);

                        reader.readAsDataURL(file);
                    });

                    $uploader[0].files = dt.files;
                });

                $filesContainer.on("click", ".btn-remove", function (e) {
                    e.preventDefault();

                    var $t = $(this);
                    var $file = $t.closest(".uploaded-item");

                    $.each(dt.items, function (i, v) {
                        var temp = v.getAsFile();

                        if (temp.lastModified == $file.prop("id")) {
                            dt.items.remove(i);

                            return false; //breaks out of $.each()
                        }
                    });

                    $uploader[0].files = dt.files;

                    $file.remove();

                    if ($uploader.is(":disabled")) {
                        $uploader.prop("disabled", false);
                    }

                    return false;
                });
            }
        }

        const validImageMimes = ["image/jpeg", "image/png", "image/gif"];

        var imageTemplate = "<img src='#url#' /><button class='btn btn-dark btn-remove' type='button'><i class='fal fa-times'></i></button><div class='file-name'>#filename#</div>";
        var fileTemplate = "<i class='fal fa-file-alt'></i><button class='btn btn-dark btn-remove' type='button'><i class='fal fa-times'></i></button><div class='file-name'>#filename#</div>";
        var loadingTemplate = "<span class='spinner-border spinner-border-sm' role='status'></span>";
        var loadingMultipleTemplate = "<div id='#index#' class='uploaded-item flexbox'><span class='spinner-border' role='status'></span><div class='file-name'>Loading...</div></div>";
    };
}(jQuery));
//this is for front end customizations only
//do NOT use this for anything in the admin ever
