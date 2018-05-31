<template>
    <div class="calendar is-large" id="datepicker">
        <div class="calendar-nav">
            <div class="calendar-nav-previous-month">
                <button class="button is-text">
                    <i class="fa fa-chevron-left"></i>
                </button>
            </div>
            <div class="calendar-date">{{ date.format('MMMM YYYY') }}</div>
            <div class="calendar-nav-next-month">
                <button class="button is-text">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="calendar-container">
            <div class="calendar-header">
                <div class="calendar-date" v-for="day in days">{{ day }}</div>
            </div>
            <div class="calendar-body" v-for="week in month" :key="week.week">
                <div class="calendar-date" :class="{ 'is-disabled': isDisabled(day) }" v-for="(day, index) in week.days" :key="index">
                    <button class="date-item" :class="{ 'is-today': isToday(day) }">{{ day.format('DD') }}</button>
                    <div class="calendar-events">
                        <a class="calendar-event" :class="'is-' + event.status" v-for="event in eventsOf(day)" :key="event.id" @click="openModal(event)">{{ event.name }}</a>
                    </div>
                </div>
            </div>
        </div>
        <modal @close="modal['status'] = false" v-show="modal['status']">
            <p>{{ modal['text'] }}</p>
        </modal>
    </div>
</template>

<script>
    let moment = require('moment');
        moment.locale('fr');

    let events = {
       "2017-10-30":[
           {"id":26,"name":"Icie Williamson","starts_at":"2017-10-30 15:21:28"}
       ],
       "2017-10-27":[
           {"id":1,"name":"Olaf Hintz","starts_at":"2017-10-27 15:21:28"},
           {"id":10,"name":"Mr. Sanford Kassulke","starts_at":"2017-10-27 15:21:28"}
       ],
       "2017-10-14":[
           {"id":2,"name":"Juana Schmitt","starts_at":"2017-10-14 15:21:28"},
           {"id":6,"name":"Vito Simonis","starts_at":"2017-10-14 15:21:28"},
           {"id":14,"name":"Lisette McLaughlin","starts_at":"2017-10-14 15:21:28"}
       ]
    };
    
    export default {
        data() {
            return {
                events: events,
                date: moment(),
                days: moment.weekdays(true),
                modal: {
                    'status': false,
                    'text': ''
                }
            };
        },
        mounted() {
        },
        computed: {
            startWeek() {
                return this.date.month() === 0 ? 0 : this.date.clone().startOf('month').week();
            },
            endWeek() {
                return this.date.clone().endOf('month').week();
            },
            month() {
                const month = [];
                for (let week = this.startWeek; week <= this.endWeek; week++) {
                    month.push({
                        week: week,
                        days: [, , , , , , , ].fill(0).map((n, i) => {
                            return this.date
                            .clone()
                            .week(week)
                            .startOf('week')
                            .add(i, 'day');
                        })
                    });
                }
                return month;
            }
        },
        methods: {
            isDisabled(day) {
                return moment().clone().startOf('month') > day || moment().clone().endOf('month') < day;
            },
            isToday(day) {
                return moment().format('YYYY-MM-DD') === day.format('YYYY-MM-DD');
            },
            eventsOf(day) {
                return this.events[day.format('YYYY-MM-DD')];
            },
            openModal(event) {
                this.modal['text'] = event.name;
                this.modal['status'] = true;
            }
        }
    }
</script>
