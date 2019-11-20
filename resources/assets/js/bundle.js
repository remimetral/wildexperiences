
import Home from './pages/home';
import Activities from './pages/activities';
import Pack from './pages/pack';
import Calendar from './pages/calendar';
import Location from './pages/location';
import Login from './pages/login';
import Password from './pages/password';
import Register from './pages/register';
import Deeplink from './deeplink';

export const deeplink = new Deeplink();

export default class Bundle {
    /**
     * @constructor
     */
    constructor() {
        this.eventReload = new Event('reload');
        this.init();
        this.burger();
    }

    /**
     * Initialize
     */
    init() {
        const home = new Home();
        const activities = new Activities();
        const pack = new Pack();
        const calendar = new Calendar();
        const location = new Location();
        const login = new Login();
        const password = new Password();
        const register = new Register();
        /*var timerid = setTimeout(() => {
            window.dispatchEvent(this.eventReload);
        }, 2000);*/
    }

    /**
     * Burger
     */
    burger() {
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }
    }
}
