<template>
    <div class="tiles">
        <section class="filter">
            <b-field>
                <b-radio-button v-model="selectedCategory" native-value="All" checked>All</b-radio-button>
                <b-radio-button v-model="selectedCategory" native-value="Tech">Tech</b-radio-button>
                <b-radio-button v-model="selectedCategory" native-value="Entertainment">Entertainment</b-radio-button>
                <b-radio-button v-model="selectedCategory" native-value="Fictional">Fictional</b-radio-button>
            </b-field>
        </section>
        <div class="tile is-ancestor" v-for="persons in filteredPeople">
            <div class="tile is-parent" v-for="person in persons">
                <article class="tile is-child box" :key="person.name">
                    <p class="title">{{ person.name }}</p>
                    <p class="subtitle">With some content</p>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                    </div>
                </article>
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
        		selectedCategory: "All",
            };
        },
        computed: {
            filteredPeople() {
    			var vm = this;
                var _ = require('lodash');
    			var category = vm.selectedCategory;

    			if(category === "All") {
    				return _.chunk(vm.people, 3);
    			} else {
    				return _.chunk(vm.people.filter(function(person) {
    					return person.category === category;
    				}), 3);
    			}
            }
        },
        methods: {

        },
        mounted() {

        }
    }
</script>
