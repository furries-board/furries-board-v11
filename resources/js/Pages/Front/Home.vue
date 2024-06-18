<script setup>
import { ref } from 'vue';
import FrontendAppLayout from '@/Layouts/FrontendAppLayout.vue';

// const boards = ref([
//     {
//         "name": "德國魚",
//         "gender": "男",
//         "birthday": "4月8日",
//         "age": "40歲",
//         "interest": "吃飯，睡覺，打東東",
//     },
//     {"name": "韓國昌"},
//     {"name": "蔡日文"},
//     {"name": "賴濁德"},
// ])

</script>

<template>

    <FrontendAppLayout title="首頁">

        <section>

            <h2 class="font-bold text-3xl">跟你志同道合的人</h2>
    
            <!-- Board List -->
            <div class="py-8 grid grid-cols-4 grid-rows-2 gap-x-8">
    
                <!-- Board -->
                <div v-for="board in boards" class="flex flex-col items-center shadow-md rounded-lg border p-6 hover:shadow-lg transition-all">
                    
                    <div :class="board.avatar ?? 'bg-blue-400'" class="flex justify-center items-center w-16 aspect-square rounded-full overflow-hidden mb-2">
                        <img v-if="board.avatar" class="w-full h-full object-cover" :src="board.avatar" alt="avatar">
                        <p v-if="!board.avatar" class="text-xl font-bold text-white">{{ board.name[0] }}</p>
                    </div>
                    
                    <p class="text-xl font-bold">{{ board.name }}</p>

                    <!-- 預設資料 -->
                    <ul class="text-center py-2">
                        <li><i class="text-gray-500 mr-2 fa fa-intersex"></i>性別: {{ board.gender ?? "不透露" }}</li>
                        <li><i class="text-gray-500 mr-2 fa fa-birthday-cake"></i>生日: {{ board.birthday ?? "不透露" }}</li>
                        <li><i class="text-gray-500 mr-2"></i>年齡: {{ board.age ?? "不透露" }}</li>
                        <li class="">{{ board.interest ?? "不透露" }}</li>
                    </ul>

                    <p class="text-center">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae consequatur aut officia consequuntur repudiandae perspiciatis veritatis sapiente ex quos nemo. Repellat voluptatibus magnam quis commodi atque esse libero dolorem similique.
                    </p>

                    <a class="mt-4 group" :href="'#'">
                        <button class="flex justify-center items-center px-6 py-3 rounded-full bg-blue-600 hover:bg-blue-700 text-white">
                            查看個人檔案
                            <i class="ml-2 text-lg fa fa-user-circle-o"></i>
                        </button>
                    </a>
                </div>
                
            </div>

        </section>

    </FrontendAppLayout>

</template>