<script setup>
import {ref} from 'vue'

const cardItems = [
    {
        'id': '0',
        'title': 'Пищевая система',
        'content': 'Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека',
        'src': '/assets/images/pishevaia.png'
    }, {
        'id': '1',
        'title': 'Пищевая система',
        'content': 'Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека',
        'src': '/assets/images/pishevaia.png'
    }, {
        'id': '2',
        'title': 'Пищевая система',
        'content': 'Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека',
        'src': '/assets/images/pishevaia.png'
    }, {
        'id': '3',
        'title': 'Пищевая система',
        'content': 'Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека',
        'src': '/assets/images/pishevaia.png'
    }, {
        'id': '4',
        'title': 'Пищевая система',
        'content': 'Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека.Поговорим о пищевой системе человека',
        'src': '/assets/images/pishevaia.png'
    },
]


const itemExps = [{
    'forId':'0',
    'Exps':[{
        'id':'0',
        'title': 'Ротовая полость',
        'content': 'Это начальный отдел как пищеварительной, так и дыхательной систем. С внутренней стороны ротовая полость покрыта слизистой оболочкой. В здоровом состоянии цвет слизистой оболочки полости рта может быть от красновато-розового до градаций коричневого или черного.'
    },{
        'id':'1',
        'title': 'Желудок',
        'content': 'Резервуар верхнего отдела пищеварительного тракта, образованный из гладкой мышечной ткани, в котором происходит частичное расщепление и разжижение пищи и регулярное ее продвижение в подходящих объемах (порциями) в тонкую кишку.'
    }]
},
    {
        'forId':'1',
        'Exps':[{
            'id':'0',
            'title': 'Ротовая полоqweqweсть',
            'content': 'Это начальный отqweqweдел как пищеварительной, так и дыхательной систем. С внутренней стороны ротовая полость покрыта слизистой оболочкой. В здоровом состоянии цвет слизистой оболочки полости рта может быть от красновато-розового до градаций коричневого или черного.'
        },{
            'id':'1',
            'title': 'Желуqweдок',
            'content': 'Резервуаadasdр верхнего отдела пищеварительного тракта, образованный из гладкой мышечной ткани, в котором происходит частичное расщепление и разжижение пищи и регулярное ее продвижение в подходящих объемах (порциями) в тонкую кишку.'
        }]
    }
]


let currentItem = ref(null)

function chooseItem(id) {
    currentItem.value = id
}


function toggleAccordion(index) {
    const content = document.getElementById(`content-${index}`);
    const icon = document.getElementById(`icon-${index}`);

    // SVG for Down icon
    const downSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>
    `;

    // SVG for Up icon
    const upSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
      </svg>
    `;

    // Toggle the content's max-height for smooth opening and closing
    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        content.style.maxHeight = '0';
        icon.innerHTML = upSVG;
    } else {
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.innerHTML = downSVG;
    }
}
</script>

<template>


    <div class="p-7">
        <div class="text-center">

            <span class="text-[40px] font-semibold text-gray-700 underline" id="title-train">Обучение</span>
        </div>

        <div class=" mt-10">
            <div class="grid gap-5 lg:grid-cols-3 sm:grid-cols-2" v-if="currentItem === null">

                <div v-for="cardItem in cardItems"
                     class="bg-designColor1 text-gray-100 p-3 rounded-md cursor-pointer
                        transform transition-transform duration-300 hover:scale-105"
                     @click="chooseItem(cardItem['id'])"
                >
                    <div>
                        <span class="font-semibold text-lg">{{ cardItem['title'] }}</span>
                    </div>

                    <div>
                        <span>{{ cardItem['content'] }}</span>
                    </div>

                    <div class="p-3 bg-white rounded-md max-h-[250px]">
                        <img :src="cardItem['src']" alt="" class=""
                             style="
                            object-fit: cover;
                            width: 100%;
                            height: 200px;
                        "
                        >
                    </div>
                </div>
            </div>


            <div v-if="currentItem" id="accordion">
                <a @click="currentItem=null"
                   class="lg:ms-[150px]  cursor-pointer underline text-[20px] font-semibold text-designColor1">← Назад</a><br>
            <div class="lg:mx-[200px] mt-[20px]">


                <div v-for="itemExp in itemExps[currentItem]['Exps']" class="border-b border-slate-200">
                    <button @click="toggleAccordion(itemExp['id'])"
                            class="w-full flex justify-between items-center py-5 text-slate-800 px-5
                                transition-bg duration-500 hover:bg-gray-200
                                    ">
                        <span>{{itemExp['title']}}</span>
                        <span :id="'icon-' + itemExp['id']" class="text-slate-800 transition-transform duration-300">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                  d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z"
                                  clip-rule="evenodd"/>
                          </svg>
                        </span>
                    </button>
                    <div :id="'content-'+itemExp['id']" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-5 text-sm text-slate-500">
                            {{itemExp['content']}}
                        </div>
                    </div>
                </div>


            </div>
            </div>

        </div>
    </div>

</template>

<style scoped>


#title-train, #accordion {
    font-family: "Bitter", serif;
}
</style>
