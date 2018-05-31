<template>
    <div class="grid">
        <div class="filter btn-group btn-group-toggle">
            <label class="btn btn-secondary active">
                <input type="radio" name="options" v-model="selectedCategory" value="All" checked> All
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" v-model="selectedCategory" value="Tech"> Tech
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" v-model="selectedCategory" value="Entertainment"> Entertainment
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="options" v-model="selectedCategory" value="Fictional"> Fictional
            </label>
        </div>
        <div class="row" v-for="persons in filteredPeople">
            <div class="column" v-for="person in persons">
                <transition-group name="staggered-fade" tag="article"
                                  v-bind:css="false"
                                  v-on:before-enter="beforeEnter"
                                  v-on:enter="enter"
                                  v-on:leave="leave">
                    <article class="box" :key="person.name">
                        <p class="title">{{ person.name }}</p>
                        <p class="subtitle">With some content</p>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                        </div>
                    </article>
                </transition-group>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                people: [
        			{ name: "Bill Gates", category: "Tech" },
        			{ name: "Steve Jobs", category: "Tech" },
        			{ name: "Jeff Bezos", category: "Tech" },
        			{ name: "George Clooney", category: "Entertainment" },
        			{ name: "Meryl Streep", category: "Entertainment" },
        			{ name: "Amy Poehler", category: "Entertainment" },
        			{ name: "Lady of Lórien", category: "Fictional" },
        			{ name: "BB8", category: "Fictional" },
        			{ name: "Michael Scott", category: "Fictional" }
        		],
        		selectedCategory: "All"
            };
        },
        computed: {
            filteredPeople() {
    			var vm = this;
                var _ = require('lodash');
    			var category = vm.selectedCategory;

    			if(category === "All") {
    				return _.chunk(vm.people, 4);
    			} else {
    				return _.chunk(vm.people.filter(function(person) {
    					return person.category === category;
    				}), 4);
    			}
            }
        },
        methods: {
            beforeEnter(el) {
                el.style.opacity = 0;
            },
            enter(el) {
                TweenMax.to(el, 2, { opacity: 1, ease: Expo.easeOut });
            },
            leave(el) {
                TweenMax.to(el, 2, { opacity: 0, ease: Expo.easeOut });
            }
        },
        mounted() {

        }
    }
</script>
