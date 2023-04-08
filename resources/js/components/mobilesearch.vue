<template>
    <div class="mobile-search__body">
        <div class="d-flex w-100 autocomplete">
            <input type="text" class="mobile-search__input" name="query" id="query" placeholder="Enter Product Name or MFR"
                v-model="search" @input="onChange" v-on:keyup.enter="onEnter" />
            <button type="submit" class="mobile-search__button mobile-search__button--search">
                <svg width="20" height="20">
                    <path
                        d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                </svg>
            </button>
            <button type="button" class="mobile-search__button mobile-search__button--close" @click="disablesearch();">
                <svg width="20" height="20">
                    <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3C17.1,15.7,17.1,16.3,16.7,16.7z" />
                </svg>
            </button>
        </div>
        <div class="mobile-search__field" v-show="isOpen">
            <div class="suggestions__group-title" style="margin:5px;">Possible Items Matches</div>
            <div v-for="(result, i) in results" :key="i" style="display:flex; margin:10px">
                <img class="image__tag" v-bind:src="'https://app.fa-bt.com/' + result.thumbnail" alt="" width="60px;"/>
                <a class="suggestions__category" @click="redirectProduct(result.slug)">{{ result.title }}</a>
            </div>
        </div>
    </div>
</template>


<script>

import axios from 'axios';
Vue.prototype.$http = axios;
export default {
    name: 'SearchAutocomplete',
    props: {
        items: {
            type: Array,
            required: false,
            default: () => [],
        },
    },
    data() {
        return {
            search: '',
            results: [],
            isOpen: false,
            products: [],
        };
    },
    methods: {
        onEnter: function () {
            var param = this.search;
            window.location.href = "/search/" + param
        },
        async getData() {
            try {
                const response = await this.$http.get(
                    "https://store.fa-bt.com/api/mobilesearch?title=" + this.search, // for suggestion
                );


                this.results = response.data.data.product;

                if (this.search.length < 1) {
                    this.isOpen = false;
                } else {
                    this.isOpen = true;
                }

            } catch (error) {
                console.log(error);
            }
        },

        onChange() {
            this.getData();
        },
        getPic(index) {
            return this.results[index].thumbnail;
        },
        redirectProduct(param) {
            window.location.href = "/product/" + param
        },
        disablesearch(){
            this.isOpen = false;
        }
    },
    created() {
        // this.getData();
    },
}

</script>
