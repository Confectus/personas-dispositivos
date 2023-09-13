<script setup>
import { Link } from '@inertiajs/vue3';

const emit = defineEmits(['edition', 'show'])

const props = defineProps([
    'person',
]);

const edition_action = () => {
    emit('edition', props.person)
};

const show_action = () => {
    emit('show', props.person)
};
</script>

<template>
    <tr class="bg-white hover:bg-gray-100">
        <td class="py-2 px-4">{{ '*******' + person.id.substring(7, 11) }}</td>
        <td class="py-2 px-4">{{ person.names }}</td>
        <td class="py-2 px-4">{{ person.last_names }}</td>
        <td class="py-2 px-4">{{ person.phone }}</td>
        <td class="py-2 px-4">
            <button @click.prevent="edition_action"
                    class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-2 py-1 rounded mr-2">Editar</button>
            <Link :href="route('people.destroy', person.id)" method="delete"
                  class="bg-red-500 hover:bg-red-600 text-white font-semibold px-2 py-1 rounded">Eliminar</Link>
            <button @click.prevent="show_action"
                  class="bg-blue-500 hover:bg-blue-600 text-black font-semibold px-2 py-1 rounded">Listar Dispositivos</button>
        </td>
    </tr>
</template>

