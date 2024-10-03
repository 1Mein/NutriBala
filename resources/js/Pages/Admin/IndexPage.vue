<script>
import Multiselect from 'vue-multiselect'
import {formToJSON} from "axios";

export default {
    components: {Multiselect},
    data() {
        return {
            products: [],
            dishes: [],


            product_errors: [],
            dish_errors: [],

            options: [],

            product_name: '',
            product_desc: '',
            product_image: '',

            dish_name: '',
            dish_desc: '',
            dish_image: null,
            dish_products: null,
        }
    },
    mounted() {
        this.fetchProducts()
        this.fetchDishes()
    },
    methods: {
        fetchProducts() {
            axios.get('/api/v1/admin/products', {
                headers: {
                    'authorization': 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.products = response.data;
                    this.options = this.products.map(i => ({name: i.name, id: i.id}));
                })
                .catch(error => console.log(error))
        },
        storeProduct() {
            axios({
                method: 'post',
                url: '/api/v1/admin/products',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'content-type': 'multipart/form-data',
                },
                data: {
                    'name': this.product_name,
                    'desc': this.product_desc,
                    'images': this.product_image,
                }
            })
                .then(response => {
                    console.log(response.data);
                    this.product_errors = [];
                    this.fetchProducts();
                })
                .catch(err => {
                    console.log(err.response)
                    this.product_errors = err.response.data.errors;
                });
        },
        insertedProductFile(e) {
            this.product_image = e.target.files[0];

        },

        deleteProduct(product_id) {
            axios({
                method: 'delete',
                url: '/api/v1/admin/products/' + product_id,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                }
            })
                .then(response => {
                    console.log(response.data);
                    this.fetchProducts();
                })
                .catch(err => {
                    console.log(err.response)
                });
        },




        fetchDishes() {
            axios.get('/api/v1/admin/dishes', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                }
            })
                .then(response => {
                    this.dishes = response.data;
                })
                .catch(error => console.log(error))


        },


        storeDish() {
            axios({
                method: 'post',
                url: '/api/v1/admin/dishes',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    'content-type': 'multipart/form-data',
                },
                data: {
                    'product_ids': this.dish_products.map(i => i['id']),
                    'name': this.dish_name,
                    'desc': this.dish_desc,
                    'images': this.dish_image,
                }
            })
                .then(response => {
                    console.log(response.data);
                    this.dish_errors = [];
                    this.fetchDishes();
                    // this.dishes = response.data;
                })
                .catch(err => {
                    console.log(err.response)
                    this.dish_errors = err.response.data.errors;
                });
        },

        insertedDishFile(e) {
            this.dish_image = e.target.files[0];

        },


        deleteDish(dish_id) {
            // console.log(dish_id);

            axios({
                method: 'delete',
                url: '/api/v1/admin/dishes/' + dish_id,
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token'),
                }
            })
                .then(response => {
                    console.log(response.data);
                    this.fetchDishes();
                })
                .catch(err => {
                    console.log(err.response)
                });
        }

    }


}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<template>
    <div class="grid sm:grid-cols-2 row-auto gap-5 grid-cols-1 p-4">
        <div class="border-2 border-gray-200 rounded-md p-4">
            <p class="font-bold text-center text-2xl">
                Добавить продукт
            </p>
            <form @submit.prevent="storeProduct()" method="POST">

                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Название</label>
                <input id="name" name="name" v-model="product_name"
                       class="block w-full rounded-md border border-gray-400 p-1.5 text-gray-900 text-[13px]"
                       placeholder="Название продукта">

                <label for="desc" class="block text-sm mt-3 font-medium leading-6 text-gray-900">Дополнительно</label>
                <textarea id="desc" name="desc" v-model="product_desc"
                          class="block w-full rounded-md border border-gray-400 p-1.5 text-gray-900 text-[13px]"
                          placeholder="Дополнительная информация"></textarea>


                <label for="images" class="block text-sm mt-3 font-medium leading-6 text-gray-900">Фотография</label>

                <input @change="insertedProductFile($event)"
                    type="file"
                    id="images" name="images"
                    class="text-sm text-stone-500
                    border border-gray-400 rounded-md w-full
   file:mr-5 file:py-1 file:px-3 file:border-[1px]
   file:text-xs file:font-medium
   file:bg-stone-50 file:text-stone-700
   file:rounded-md
   hover:file:cursor-pointer hover:file:bg-blue-50
   hover:file:text-blue-700"
                />
                <div class="text-center">

                    <button type="submit" class="mt-4 bg-[#374F75] text-white px-4 py-2 rounded">Добавить</button>
                </div>

                <div v-if="product_errors" class="text-xs text-red-600">
                    <span v-for="error in product_errors">{{ error[0] }}<br></span>
                </div>
            </form>
        </div>

        <div class="border-2 border-gray-200 rounded-md p-4">
            <p class="font-bold text-center text-2xl">
                Добавить блюдо
            </p>
            <form @submit.prevent="storeDish()" method="POST">

                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Название</label>
                <input id="name" v-model="dish_name" name="name"
                       class="block w-full rounded-md border border-gray-400 p-1.5 text-gray-900 text-[13px]"
                       placeholder="Название продукта">

                <label for="desc" class="block text-sm mt-3 font-medium leading-6 text-gray-900">Дополнительно</label>
                <textarea id="desc" v-model="dish_desc" name="desc"
                          class="block w-full rounded-md border border-gray-400 p-1.5 text-gray-900 text-[13px]"
                          placeholder="Дополнительная информация"></textarea>


                <label for="images" class="block text-sm mt-3 font-medium leading-6 text-gray-900">Фотография</label>

                <input
                    type="file"
                    id="images" name="images"
                    class="text-sm text-stone-500
                    border border-gray-400 rounded-md w-full
   file:mr-5 file:py-1 file:px-3 file:border-[1px]
   file:text-xs file:font-medium
   file:bg-stone-50 file:text-stone-700
   file:rounded-md
   hover:file:cursor-pointer hover:file:bg-blue-50
   hover:file:text-blue-700"
                    @change="insertedDishFile($event)"
                />

                <div>
                    <label for="products" class="block text-sm mt-3 font-medium leading-6 text-gray-900">Выберите
                        продукты</label>
                    <multiselect id="products" name="product_ids[]" v-model="dish_products" :options="options"
                                 label="name" track-by="name" :multiple="true" class=""></multiselect>
                </div>
                <div v-if="dish_errors" class="text-xs text-red-600">
                    <span v-for="error in dish_errors">{{ error[0] }}<br></span>
                </div>

                <div class="text-center">

                    <button type="submit" class="mt-4 bg-[#374F75] text-white px-4 py-2 rounded">Добавить</button>
                </div>
            </form>
        </div>

        <div>
            <ul role="list" class="divide-y divide-gray-100">
                <li v-for="product in products" :key="product.id" class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="product.images" alt=""/>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ product.name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ product.desc }}</p>
                        </div>
                    </div>
                    <div>

                        <a @click="deleteProduct(product.id)" class="text-sm bg-red-300 p-2 rounded-md cursor-pointer">Удалить</a>
                    </div>
                </li>
            </ul>
        </div>


        <div>
            <ul role="list" class="divide-y divide-gray-100">
                <li v-for="dish in dishes" :key="dish.id" class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" :src="dish.images" alt=""/>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ dish.name }}</p>

                            <div>
                                <span v-for="product in dish.products" class="text-xs bg-lime-300 p-1 rounded-md me-1">{{ product.name }}</span>
                            </div>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ dish.desc }}</p>

                        </div>
                    </div>
                    <div>

                    <a @click="deleteDish(dish.id)" class="text-sm bg-red-300 p-2 rounded-md cursor-pointer">Удалить</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>


    <!--    <div v-for="product in products" >-->
    <!--        <span>-->
    <!--            {{product.name}}-->
    <!--        </span>-->
    <!--    </div>-->
</template>

