<script setup>
import { ref } from 'vue';
import FrontendAppLayout from '@/Layouts/FrontendAppLayout.vue';

defineProps({
    boards: Array,
});

function birthday_month_day(birthday_date) {
    const date = new Date(birthday_date);
    const formatter = new Intl.DateTimeFormat('en-US', { month: '2-digit', day: '2-digit'});
    return formatter.format(date).replace('/', '-');
}

</script>

<template>

    <FrontendAppLayout title="首頁">

        <section>

            <h2 class="font-bold text-3xl">跟你志同道合的人</h2>
    
            <!-- Board List -->
            <div class="py-8 grid grid-cols-4 grid-rows-2 gap-x-8">
    
                <!-- Board -->
                <div v-for="board in boards">
                    
                    <div class="flex flex-col items-center shadow-md rounded-lg border p-6 hover:shadow-lg transition-all">

                        <div :class="board.user.profile_photo_url ?? 'bg-blue-400'" class="flex justify-center items-center w-16 aspect-square rounded-full overflow-hidden mb-2">
                            <img v-if="board.user.profile_photo_url" class="w-full h-full object-cover" :src="board.user.profile_photo_url" alt="avatar">
                            <!-- <p v-if="!user.avatar" class="text-xl font-bold text-white">{{ user.username }}</p> -->
                        </div>
                        
                        <p class="text-xl font-bold">{{ board.user.name }}</p>
    
                        <!-- 預設資料 -->
                        <ul class="text-center py-2">
                            <li v-if="board.gender"><i class="text-gray-500 mr-2 fa fa-intersex"></i>性別: {{ board.gender ?? "不透露" }}</li>
                            <li v-if="board.birthday"><i class="text-gray-500 mr-2 fa fa-birthday-cake"></i>生日: {{ board.age == '1' ? board.birthday : birthday_month_day(board.birthday) }}</li>
                            <li v-if="board.age"><i class="text-gray-500 mr-2"></i>年齡: {{ board.age == '1' ? new Date().getFullYear() - new Date(board.birthday).getFullYear() : "不透露" }}</li>
                            <li v-if="board.interest" class="">{{ board.interest ?? "不透露" }}</li>
                        </ul>
    
                        <p class="text-center">
                            {{ board.description ?? "" }}
                        </p>
    
                        <a class="mt-4 group" :href="'#'">
                            <button class="flex justify-center items-center px-6 py-3 rounded-full bg-blue-600 hover:bg-blue-700 text-white">
                                查看個人檔案
                                <i class="ml-2 text-lg fa fa-user-circle-o"></i>
                            </button>
                        </a>

                    </div>

                </div>
                
            </div>

        </section>

    </FrontendAppLayout>

</template>