<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <h1 class="mb-6 text-center text-2xl font-bold text-gray-800">Vérification d'email</h1>

        <div class="mb-6 rounded-lg bg-indigo-50 p-4 text-sm text-gray-700 leading-relaxed">
            Merci pour votre inscription! Avant de commencer, pourriez-vous vérifier votre
            adresse e-mail en cliquant sur le lien que nous venons de vous envoyer? Si vous
            n'avez pas reçu l'e-mail, nous vous en enverrons un autre avec plaisir.
        </div>

        <div
            class="mb-6 rounded-lg bg-green-100 p-4 text-sm font-medium text-green-700"
            v-if="verificationLinkSent"
        >
            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez
            fournie lors de l'inscription.
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                <PrimaryButton
                    class="justify-center py-3 sm:w-auto"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Renvoyer l'email de vérification
                </PrimaryButton>

                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="mt-4 text-center text-sm font-medium text-indigo-600 transition-colors duration-200 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0"
                    >Déconnexion</Link
                >
            </div>
        </form>
    </GuestLayout>
</template>
