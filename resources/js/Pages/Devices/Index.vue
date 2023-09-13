<script>
import Device from "@/Components/Device.vue";

defineProps(['devices']);
</script>

<template>
    <h1 class="text-2xl font-semibold mb-4">Dispositivos:</h1>
    <table class="table-auto w-full">
        <tbody>
        <tr>
            <th>Persona ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>MAC</th>
        </tr>
        <Device v-for="device in devices" :key="device.id"
                :device="device"
        />
        </tbody>
    </table>
</template>
