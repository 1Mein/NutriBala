<script>
export default {
    data() {
        return {
            products: [],
            activeProductId: null,
            activeProduct:null,
            current_dishes:[]
        }
    },
    mounted() {
        this.fetchProducts()

    },
    methods: {
        fetchProducts() {
            axios.get('/api/v1/products')
                .then(response => this.products = response.data)
                .catch(error => console.log(error))
        },
        fetchProductDishes(product_id){
            axios.get('/api/v1/products/'+product_id+'/dishes')
                .then(response => this.current_dishes = response.data)
                .catch(error => console.log(error))
        },
        toggleInfo(id) {
            this.activeProductId = this.activeProductId === id ? null : id;

            if (this.activeProductId !== null){
                this.fetchProductDishes(id);
                this.activeProduct = this.products.find(product => product.id === this.activeProductId)
            } else {
                this.current_dishes = []
                this.activeProduct = null;
            }
        },
    }
}


</script>


<template>
    <div class="grid gap-4 mt-5 lg:grid-cols-3 md:grid-cols-2 grid-rows-4">
        <div v-for="product in products" :key="product.id" class="mx-5 relative group">

            <div class="border-2 border-gray-100 rounded-3xl h-full">
                <div @click="toggleInfo(product.id)" class="cursor-pointer">
                    <img
                        :src="product.images"
                        alt=""
                        class="transform transition-transform duration-300 hover:scale-110 object-cover"
                    >
                    <h1 class="mt-2 text-lg font-bold text-center">{{ product.name }}</h1>
                </div>



            </div>
        </div>
        <div v-if="activeProduct !== null" class="fixed inset-0 bg-black bg-opacity-75 text-white flex flex-col justify-center items-center p-4 transition-opacity duration-300">
            <h2 class="text-xl font-semibold mb-2">{{ activeProduct.name }}</h2>
            <p>{{ activeProduct.desc }}</p>

            <div class="mt-5">
                <h1 class="bold text-xl">Можно приготовить:</h1>
                <div>
                <div v-if="current_dishes" v-for="dish in current_dishes" class="flex mt-3">
                    <img :src="dish.images" alt="" class="rounded-full w-[70px]">
                    <p class="my-auto ms-3">{{dish.name}}</p>
                </div>
                </div>
            </div>



            <button @click="toggleInfo(null)" class="mt-4 bg-white text-black px-4 py-2 rounded">Закрыть</button>


        </div>
    </div>


</template>

<style scoped>

</style>
