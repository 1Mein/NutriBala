<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            password: '',
            error: false,
        }
    },
    mounted() {
    },
    methods: {
         async validateAndLogin() {
            this.error = false;
            try {
                const response = await axios.post('/api/v1/login', {
                    name: this.name,
                    password: this.password
                });
                const token = response.data.authorisation.token;
                const user = response.data.user;
                if(token){
                    localStorage.setItem('token', token);
                    localStorage.setItem('user', JSON.stringify(user));
                    window.location.href = '/admin';
                } else {
                    console.error('Token not received');
                }
            } catch (err) {
                this.error = true;
                console.error(err);
            }
        }
    }
}
</script>

<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Вход</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" @submit.prevent="validateAndLogin()" method="POST">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Логин</label>
                    <div class="mt-2">
                        <input id="name" name="name" v-model="name" type="text" autocomplete="name" required class="block w-full rounded-md border border-gray-900 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Пароль</label>
                    <div class="mt-2">
                        <input id="password" name="password" v-model="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3">
                    </div>
                </div>

                <div v-if="error" class="text-red-400">Не правильные данные</div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Войти</button>
                </div>
            </form>

        </div>
    </div>
</template>

<style scoped>

</style>
