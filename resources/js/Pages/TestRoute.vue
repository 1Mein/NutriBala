<script>
export default {
    data() {
        return {
            products: [],
            activeProduct: null, // Хранит id активного продукта
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
        toggleInfo(id) {
            this.activeProduct = this.activeProduct === id ? null : id;
        },
    }
}


</script>


<template>
    <div v-for="product in products" :key="product.id" class="relative group">
        <div @click="toggleInfo(product.id)" class="cursor-pointer">
            <img
                :src="product.images"
                alt=""
                class="transform transition-transform duration-300 group-hover:scale-110 h-64 object-cover"
            >
            <h1 class="mt-2 text-lg font-bold">{{ product.name }}</h1>
        </div>

        <!-- Дополнительная информация, показываемая при наведении или нажатии -->
        <div v-if="activeProduct === product.id" class="absolute inset-0 bg-black bg-opacity-75 text-white flex flex-col justify-center items-center p-4 transition-opacity duration-300">
            <h2 class="text-xl font-semibold mb-2">{{ product.name }}</h2>
            <p>{{ product.desc }}</p>
            <button @click="toggleInfo(null)" class="mt-4 bg-white text-black px-4 py-2 rounded">Закрыть</button>
        </div>
    </div>
</template>

<style scoped>

</style>
