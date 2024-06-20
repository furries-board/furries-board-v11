<script setup>
import { onMounted, ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue'

defineProps({
    modelValue: String,
    rows: Number
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <textarea
        ref="input"
        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm resize-none"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :rows="rows"
        maxlength="150"
    ></textarea>
    <InputLabel class="w-full" v-if="modelValue" :class="modelValue.length <= 150 ? 'text-green-600' : 'text-red-600'">{{ modelValue.length }} / 150</InputLabel>
</template>
