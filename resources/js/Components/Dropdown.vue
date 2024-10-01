<template>
    <Popover class="relative" >
        <PopoverButton class="inline-flex gap-x-1 items-center text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium leading-6">
            <span>Рубрики</span>
            <ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
        </PopoverButton>

        <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
            <PopoverPanel class="absolute left-1/2 z-10 mt-5 flex w-screen max-w-max -translate-x-1/2 px-4">
                <div class="w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5"
                     style="background-color: rgb(55, 67, 117);">
                    <div class="p-4">
                        <div v-for="item in solutions" :key="item.name" class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-700">
                            <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                <component :is="item.icon" class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" aria-hidden="true" />
                            </div>
                            <div>
                                <router-link :to="item.href" class="font-semibold text-gray-300">
                                    {{ item.name }}
                                    <span class="absolute inset-0" />
                                </router-link>
                                <p class="mt-1 text-gray-300">{{ item.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>

<script setup>
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'
import {
    QuestionMarkCircleIcon,
    ChatBubbleLeftRightIcon,
    ShieldCheckIcon,
    AcademicCapIcon,
    SparklesIcon,
} from '@heroicons/vue/24/outline'

const solutions = [
    { name: 'Рецепты', description: 'Посмотрите нашу сборку рецептов для малышей', href: '/recipes', icon: SparklesIcon },
    { name: 'Обучение', description: 'Как пользоваться нашим приложением', href: '/training', icon: AcademicCapIcon },
    { name: 'Пищевая безопасность', description: "Важная информация про пищу", href: '/safety', icon: ShieldCheckIcon },
    { name: 'Социальное', description: 'Социальное че то там', href: '/social', icon: ChatBubbleLeftRightIcon },
    { name: 'Вопросы и ответы', description: 'Получите ответ на ваши вопросы', href: '/questions', icon: QuestionMarkCircleIcon },
]
</script>
