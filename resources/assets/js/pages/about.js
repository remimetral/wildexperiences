
import Vue from 'vue';
import { deeplink } from '../bundle';

export default class About {
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
        this.id = 'about';
        this.page = null;
        this.$document = $(document);
        this.current = deeplink.$pages.eq(deeplink.current).find('.page_menu_id').val();
    }

    /**
     * Initialize
     */
    init() {
        this.$document.on('page_change', this.check.bind(this));
        /*if (this.id == this.current) {
            this.app = new Vue({el: '#app'});
        }*/
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
        //TweenMax.from(this.page.find('.bg_page'), 1, { alpha: 0, ease: Linear.easeOut });
        TweenMax.from(this.page.find('.container_page.about'), 1, { scale: .8, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
        deeplink.reInitAnimation(deeplink.delayReInit);
    }

    animationOut() {
        TweenMax.to(this.page.find('.container_page.about'), 1, { scale: .8, ease: Expo.easeOut });
    }
}
