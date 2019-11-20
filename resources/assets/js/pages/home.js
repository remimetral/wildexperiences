
import Vue from 'vue';
import { deeplink } from '../bundle';

export default class Home {
    /**
     * @constructor
     */
    constructor() {
        this.variables();
        this.init();
    }

    /**
     * Global Variables
     */
    variables() {
        this.id = 'home';
        this.page = deeplink.$pages.eq(deeplink.current);
        this.current = this.page.find('.page_menu_id').val();
        this.$document = $(document);

    }

    /**
     * Initialize
     */
    init() {
        this.$document.on('page_change', this.check.bind(this));
        if (this.id == this.current) {
            this.animationIn();
            //this.app = new Vue({el: '#app'});
        }
    }

    /**
     * Check
     */
    check(e, current_page, type) {
        if( current_page.find('.page_id').val() != this.id ) return;

        this.page = current_page;

        switch(type) {
            case 'reinit':
                this.reInit();
                break;
            case 'animation_in':
                this.animationIn();
                deeplink.reInitAnimation(deeplink.delayReInit);
                break;
            case 'animation_out':
                this.animationOut();
                break;
        }
    }

    reInit() {
        //this.app = new Vue({el: '#app'});
        this.$document.title = this.page.find('.page_title').val();
    }

    animationIn() {
        if( deeplink.$previous == 'activities' ) {
            TweenMax.from(this.page.find('.container_page'), 1, { scale: .9, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
        } else {
            TweenMax.from(this.page.find('.container_page'), 1, { scale: .9, alpha: 0, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
            TweenMax.from(this.page.find('.trame'), 1, { alpha: 0, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
        }
        this.animationText();
        this.randomSlide();
    }

    animationOut() {
        TweenMax.to(this.page.find('.container_page'), 1, { scale: .9, ease: Expo.easeOut });
        TweenMax.to(this.page.find('.trame'), 1, { alpha: 0, ease: Expo.easeOut });
        //TweenMax.to(this.page.find('.container_page'), .2, { alpha: 0, ease: Expo.easeOut, delay: 1 });
    }

    animationText() {
        var _this = this;
        var section = $('.container_page.home');

        TweenMax.from(section.find('.caption'), 1, { y: -100, alpha: 0, ease: Expo.easeOut, delay: 1.8 });
        TweenMax.from(section.find('.title'), 1, { y: 100, alpha: 0, ease: Expo.easeOut, delay: 2.2 });
        TweenMax.from(section.find('.logo'), 1, { x: -100, alpha: 0, ease: Expo.easeOut, delay: 2.8 });

        var timeline = new TimelineMax({ repeat: -1, yoyo: false, repeatDelay: 0 });

        timeline.to(section.find('.title'), 0.8, { text:{ value: "Cani-cross", padSpace: true,  ease:Linear.easeNone }, delay:4 });
        timeline.to(section.find('.title'), 0.8, { text:{ value: "Cani-rando", padSpace: true, ease:Linear.easeNone }, delay:2 });
        timeline.to(section.find('.title'), 0.8, { text:{ value: "Cani-scoot", padSpace: true, ease:Linear.easeNone }, delay:2 });
        timeline.to(section.find('.title'), 0.8, { text:{ value: "Chien de Traîneau", padSpace: true, ease:Linear.easeNone }, delay:2 });
    }

    randomSlide() {
        var $numberofSlides = $('.carousel-item').length;
        var $currentSlide = Math.floor((Math.random() * $numberofSlides));

        $('.carousel-item').eq($currentSlide).addClass('active');
        $('.carousel').carousel();
    }
}
