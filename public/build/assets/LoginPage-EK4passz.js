import{q as u,o as i,a as l,b as s,j as g,l as a,p as d,d as p}from"./app-CX8l_lNK.js";import{_ as f}from"./_plugin-vue_export-helper-DlAUqK2U.js";const c={data(){return{name:"",password:"",error:!1}},mounted(){},methods:{async validateAndLogin(){this.error=!1;try{const t=await u.post("/api/v1/login",{name:this.name,password:this.password}),e=t.data.authorisation.token,r=t.data.user;e?(localStorage.setItem("token",e),localStorage.setItem("user",JSON.stringify(r)),window.location.href="/admin"):console.error("Token not received")}catch(t){this.error=!0,console.error(t)}}}},x={class:"flex min-h-full flex-col justify-center px-6 py-12 lg:px-8"},w={class:"mt-10 sm:mx-auto sm:w-full sm:max-w-sm"},y={class:"mt-2"},v={class:"mt-2"},b={key:0,class:"text-red-400"};function h(t,e,r,k,o,m){return i(),l("div",x,[e[6]||(e[6]=s("div",{class:"sm:mx-auto sm:w-full sm:max-w-sm"},[s("h2",{class:"mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"},"Вход")],-1)),s("div",w,[s("form",{class:"space-y-6",onSubmit:e[2]||(e[2]=g(n=>m.validateAndLogin(),["prevent"])),method:"POST"},[s("div",null,[e[3]||(e[3]=s("label",{for:"name",class:"block text-sm font-medium leading-6 text-gray-900"},"Логин",-1)),s("div",y,[a(s("input",{id:"name",name:"name","onUpdate:modelValue":e[0]||(e[0]=n=>o.name=n),type:"text",autocomplete:"name",required:"",class:"block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3"},null,512),[[d,o.name]])])]),s("div",null,[e[4]||(e[4]=s("label",{for:"password",class:"block text-sm font-medium leading-6 text-gray-900"},"Пароль",-1)),s("div",v,[a(s("input",{id:"password",name:"password","onUpdate:modelValue":e[1]||(e[1]=n=>o.password=n),type:"password",autocomplete:"current-password",required:"",class:"block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-3"},null,512),[[d,o.password]])])]),o.error?(i(),l("div",b,"Не правильные данные")):p("",!0),e[5]||(e[5]=s("div",null,[s("button",{type:"submit",class:"flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"},"Войти")],-1))],32)])])}const V=f(c,[["render",h]]);export{V as default};
