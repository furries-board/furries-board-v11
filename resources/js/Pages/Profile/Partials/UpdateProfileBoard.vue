<script setup>
import { ref } from 'vue';
import { Link, router, useForm, usePage } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import TextArea from '@/Components/TextArea.vue'

const props = defineProps({
    user: Object,
    board: Object,
});

let form = '';

if (props.board) {
    
    form = useForm({
        _method: 'PUT',
        active: props.board.active,
        birthday: props.board.birthday,
        age: props.board.age,
        gender: props.board.gender,
        interest: props.board.interest,
        description: props.board.description,
    });

}  else {

    form = useForm({
        _method: 'PUT',
        active: null,
        birthday: null,
        age: null,
        gender: null,
        interest: null,
        description: null,
    });

}

const updateProfileBoard = () => {
    form.post(route('user-profile-board.update'), {
        errorBag: 'updateProfileBoard',
        preserveScroll: true,
    });
};

</script>

<template>

    <FormSection @submitted="updateProfileBoard">
        <template #title>
            Profile Board
        </template>

        <template #description>
            Update your account's profile board.
        </template>

        <template #form>

            <!-- Active -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="active" value="Active" />
                <Checkbox
                    id="active"
                    v-model="form.active"
                    autocomplete="none"
                    class="mr-2"
                    :checked="form.active == 1 ? true : false"
                />
                <label for="age">Show your age?</label>
            </div>

            <!-- Birthday -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="birthday" value="Birthday" />
                <TextInput
                    id="birthday"
                    v-model="form.birthday"
                    type="date"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError :message="form.errors.birthday" class="mt-2" />
            </div>

            <!-- Age -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="age" value="Age" />
                <Checkbox
                    id="age"
                    v-model="form.age"
                    autocomplete="none"
                    class="mr-2"
                    :checked="form.age == 1 ? true : false"
                />
                <label for="age">Show your age?</label>
            </div>

            <!-- Gender -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="gender" value="Gender" />
                <select v-model="form.gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="" selected></option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                    <option value="3">非二次元性別</option>
                    <option value="4">不透露</option>
                </select>
                <InputError :message="form.errors.gender" class="mt-2" />
            </div>

            <!-- Interest -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="interest" value="Interest" />
                <TextInput
                    id="interest"
                    v-model="form.interest"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="none"
                />
                <InputError :message="form.errors.interest" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextArea
                    id="description"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full resize-none"
                    autocomplete="none"
                    :rows="4"
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
