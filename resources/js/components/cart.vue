<template>
<div class="block">
    <div class="container">
        <h2 class="mb-4" style="text-align:center;">Shopping Cart</h2>
        <div class="cart">
            <div class="cart__table cart-table">
                <table class="cart-table__table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">
                        <tr class="cart-table__row" v-for="item in cartItems" :key="item.id">
                            <td class="cart-table__column cart-table__column--image">
                                <div class="image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" v-bind:src="'https://app.fa-bt.com/' + item.model.thumbnail" alt=""/>
                                    </a>
                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--product">
                                <a href="#" class="cart-table__product-name">{{item.model.title}}</a>
                                <ul class="cart-table__options">
                                    <li v-if="item.model.mfr">MFR: {{item.model.mfr}}</li>
                                    <li v-if="item.model.sku">SKU: {{item.model.sku}}</li>
                                    <li v-if="item.model.upc">UPC: {{item.model.upc}}</li>
                                </ul>
                            </td>
                            <td class="cart-table__column cart-table__column--price" data-title="Price">
                                AED {{item.model.price}}
                            </td>
                            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                <div class="cart-table__quantity input-number">
                                    <input class="form-control input-number__input" type="number" min="1" :value="item.qty"/>
                                    <div class="input-number__add"></div>
                                    <div class="input-number__sub"></div>
                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--total" data-title="Total">AED {{item.model.price * item.qty}}</td>
                            <td class="cart-table__column cart-table__column--remove">
                                <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                    <svg width="12" height="12">
                                        <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>

                    <tfoot class="cart-table__foot">
                        <tr>
                            <td colspan="6">
                                <div class="cart-table__actions">
                                    <form class="cart-table__coupon-form form-row">
                                        <div class="mb-0 form-group col flex-grow-1">
                                            <input type="text" class="form-control form-control-sm" placeholder="Coupon Code"/>
                                        </div>
                                        <div class="col-auto mb-0 form-group">
                                            <button type="button" class="btn btn-sm btn-primary">
                                                Apply Coupon
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="cart__totals">
                <div class="card">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">Cart Totals</h3>
                        <table class="cart__totals-table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>$5,877.00</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Shipping</th>
                                    <td>$25.00
                                        <div>
                                            <a href="#">Calculate shipping</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td>$0.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td>$5,902.00</td>
                                </tr>
                            </tfoot>
                        </table>
                        <a class="btn btn-primary btn-xl btn-block" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</template>
<script>


    export default {
        data() {
            return {
              cartItems: {},
            }
        },
        methods: {
            getCartItems(){
                axios.get('/cartData')
                     .then((response)=>{
                       this.cartItems = response.data;
                     })
            }
        },
        created() {
            this.getCartItems()
        }
    }
</script>
