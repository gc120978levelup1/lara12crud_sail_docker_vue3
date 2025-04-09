<script setup lang="ts">
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';

import DeleteUser from '@/components/DeleteUser.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/pages/viewjs/complaint/xLayout.vue';
import { type BreadcrumbItem, type SharedData, type User } from '@/types';

interface Props {
    complaint: Object,
}

const props = defineProps<Props>();

const headTitle = "View Customer Complaint";
const description = "View a new customer complaint.";
const breadcrumbs: BreadcrumbItem[] = [{
    title: 'View Complaint',
    href: '/complaint/view',
},];

const page = usePage<SharedData>();
const user = page.props.auth.user as User;

const form = useForm({
    id            :props.complaint.id,
    accountnumber :props.complaint.accountnumber, 
    name          :props.complaint.name,
    address       :props.complaint.address,
    description   :props.complaint.description,
    created_at    :props.complaint.created_at,
    updated_at    :props.complaint.updated_at,
});


const submit = () => {
    form.get(route('complaint.index'), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head v-bind:title="headTitle" />
        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall v-bind:title="headTitle" v-bind:description="description" />
                <form @submit.prevent="submit" class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="accountnumber">Account Number</Label>
                        <Input id="accountnumber" class="mt-1 block w-full" v-model="form.accountnumber" required autocomplete="accountnumber"
                            placeholder="accountnumber" />
                        <InputError class="mt-2" :message="form.errors.accountnumber" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="name">Name</Label>
                        <Input id="name" class="mt-1 block w-full" v-model="form.name" required autocomplete="name"
                            placeholder="Full name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="address">Address</Label>
                        <Input id="name" class="mt-1 block w-full" v-model="form.address" required autocomplete="address"
                            placeholder="Address" />
                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="description">Description</Label>
                        <Input id="description" class="mt-1 block w-full" v-model="form.description" required autocomplete="description"
                            placeholder="Description" />
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="created_at">Created At</Label>
                        <Input id="created_at" class="mt-1 block w-full" v-model="form.created_at" required autocomplete="created_at"
                            placeholder="created_at" />
                        <InputError class="mt-2" :message="form.errors.created_at" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="updated_at">Updated At</Label>
                        <Input id="updated_at" class="mt-1 block w-full" v-model="form.updated_at" required autocomplete="updated_at"
                            placeholder="updated_at" />
                        <InputError class="mt-2" :message="form.errors.updated_at" />
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="ml-auto my-auto">
                            <Button :disabled="form.processing">Back</Button>
                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Backed.</p>
                            </Transition>
                        </div>
                    </div>
                </form>
            </div>

        </SettingsLayout>
    </AppLayout>
</template>
