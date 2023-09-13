<script setup>
import Person from '@/Components/Person.vue';
import Device from '@/Components/Device.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps([
    'people',
]);

const edition = ref(false);

const form = useForm({
    id: '',
    names: '',
    last_names: '',
    phone: '',
    email: '',
});

const edit = (edit_person) => {
    edition.value = true;

    form.id = edit_person.id;
    form.names = edit_person.names;
    form.last_names = edit_person.last_names;
    form.phone = edit_person.phone;
};

const show = (person_devices) => {
    //
};

const submit = () => {
    if (edition.value) {
        form.put(route('people.update', form.id), {
            onSuccess: () => form.reset()
        });

        edition.value = false;
    }
    else {
        form.post(route('people.store'), {
            onSuccess: () => form.reset()
        });
    }
};
</script>

<template>
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded shadow-md mb-4">
            <h3 class="text-2xl font-semibold mb-4">Crear una nueva persona:</h3>

            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label for="person_id" class="block text-gray-600">Identificación:</label>
                    <input v-model="form.id" type="text" id="person_id" required
                           class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="person_names" class="block text-gray-600">Nombres:</label>
                    <input v-model="form.names" type="text" id="person_names" required
                           class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="person_last_names" class="block text-gray-600">Apellidos:</label>
                    <input v-model="form.last_names" type="text" id="person_last_names" required
                           class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="person_phone" class="block text-gray-600">Teléfono:</label>
                    <input v-model="form.phone" type="text" id="person_phone" required
                           class="w-full border border-gray-300 rounded p-2">
                </div>

                <div class="mb-4">
                    <label for="person_email" class="block text-gray-600">Correo:</label>
                    <input v-model="form.email" type="email" id="person_email" required
                           class="w-full border border-gray-300 rounded p-2">
                </div>

                <button class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-4 py-2 rounded"
                        :disabled="form.processing">{{ edition ? 'Editar' : 'Crear' }}</button>
            </form>
        </div>

        <h1 class="text-2xl font-semibold mb-4">Listado de Personas:</h1>
        <table class="table-auto w-full">
            <tbody>
            <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            <Person v-for="person in people" :key="person.id"
                    :person="person" @edition="(edit_person) => edit(edit_person)"
                    @show="(person_devices => show(person_devices))"
            />
            </tbody>
        </table>
    </div>
</template>
