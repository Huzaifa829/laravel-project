<template>
    <div>
        <div class="search__body">
            <div class="search__shadow"></div>
                <input autocomplete="off" v-on:keyup.enter="onEnter" class="search__input" type="text" name="query" id="query" placeholder="Enter Name or MFR"  v-model="search" @input="onChange"  />
                <button class="search__button search__button--end" type="submit">
                    <span class="search__button-icon">
                        <svg width="20" height="20">
                            <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="search__dropdown" v-show="isOpen">
                <div class="suggestions__arrow"></div>
                <div class="suggestions__group" v-if="results.length">
                    <div>
                        <div class="suggestions__group-title">Suggestions</div>
                    </div>
                    <div>
                        <div v-for="(result, i) in results" :key="i">
                            <a class="suggestions__category" @click="redirectcat(result.tags)" @mouseover="getProduct(result.tags)">{{ result.tags }}</a>
                        </div>
                    </div>
                    <div style="width: 500px;">
                        <div v-show="products.length != 0"><div class="suggestions__group-title">Possible Items Matches</div>
                        <div class="suggestions__group-content">
                            <div v-for="(product, i) in products" :key="i">
                                <a class="suggestions__product" @click="redirectProduct(product.slug)">
                                    <div class="suggestions__product-image image image--type--product">
                                        <div class="image__body">
                                            <img class="image__tag" v-bind:src="'https://app.fa-bt.com/' + product.thumbnail" alt="" />
                                        </div>
                                    </div>
                                    <div class="suggestions__product-info">
                                        <div class="suggestions__product-name">{{ product.title }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="suggestions__group_product" v-else-if="products.length">
                    <div style="width: 500px;">
                        <div v-show="products.length != 0"><div class="suggestions__group-title">Possible Items Matches</div>
                        <div class="suggestions__group-content">
                            <div v-for="(product, i) in products" :key="i">
                                <a class="suggestions__product" @click="redirectProduct(product.slug)">
                                    <div class="suggestions__product-image image image--type--product">
                                        <div class="image__body">
                                            <img class="image__tag" v-bind:src="'https://app.fa-bt.com/' + product.thumbnail" alt="" />
                                        </div>
                                    </div>
                                    <div class="suggestions__product-info">
                                        <div class="suggestions__product-name">{{ product.title }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                    "https://store.fa-bt.com/api/search?title=" + this.search, // for suggestion
                );

                this.results = response.data.data.suggestions;
                this.products = response.data.data.product;
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
        async getProduct(param) {
            try {
                const response = await this.$http.get(
                    "https://store.fa-bt.com/api/product-search?title=" + param, // for products
                );
                this.products = response.data.product;
            } catch (error) {
                console.log(error);
            }
        },
        redirectProduct(param) {
            window.location.href = "/product/" + param
        },
        redirectcat(param1) {
            window.location.href = "/suggestion-search/" + param1
        }
    },
    created() {
        // this.getData();
    },
}

</script>

