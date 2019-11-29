
import Vue from 'vue';
import { deeplink } from '../bundle';

export default class Pack {
    /**
     * @constructor
     */
    constructor() {
        this.variables();
        this.initEls();
        this.init();
    }

    /**
     * Global Variables
     */
    variables() {
        this.id = 'pack';
        this.page = null;
        this.$document = $(document);
        this.current = deeplink.$pages.eq(deeplink.current).find('.page_menu_id').val();
    }

    /**
     * Initialize elements
     */
    initEls() {
        this.els = {
            background: document.getElementsByClassName("bg_page"),
            figure: document.getElementsByClassName("figure"),
        };
    }

    /**
     * Initialize
     */
    init() {
        this.$document.on('page_change', this.check.bind(this));
        if (this.id == this.current) {
            this.animationIn();
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
        TweenMax.from(this.els.background[0], 1, { alpha: 0, ease: Linear.easeOut });
        Array.from(this.els.figure).forEach((el) => {
            TweenMax.from(el, 1, { y: 200, alpha: 0, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn + el.dataset.id/4 });
        });
        deeplink.reInitAnimation(deeplink.delayReInit);
    }

    animationOut() {
        TweenMax.to(this.page.find('.bg_page'), 1, { alpha: 0, ease: Linear.easeOut });
        Array.from(this.els.figure).forEach((el) => {
            TweenMax.to(el, 1, { y: -200, alpha: 0, ease: Expo.easeOut, delay: el.dataset.id/8 });
        });
    }

    animationFigure() {
        var _this = this;
        var section = $('.container_page.pack');

        var els = document.getElementsByClassName("figure");

        [].forEach.call(els, function (el) {
            console.log(el.tagName);
        });

        TweenMax.from(section.find('.test'), 1, { y: -100, alpha: 0, ease: Expo.easeOut, delay: 1.8 });

    }
}
