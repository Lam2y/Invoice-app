<script setup>
import { onMounted, ref, watch } from 'vue';
import axios from 'axios';
import {useRouter} from 'vue-router';

let router=useRouter();
let invoices = ref([]);
let searchInvoice = ref('');

onMounted(async () => {
    await getInvoices();
});

watch(searchInvoice, async (newValue) => {
    await search(newValue);
});

const onShow = (id) =>{
    router.push('/invoice/show/'+id)
}

const newInvoice=async()=>{
    let from=await axios.get('/api/create-invoice');
    router.push('/invoice/new');
}

const search = async (query) => {
    try {
        let response = await axios.get(`/api/search_invoices?s=${query}`);
        invoices.value = response.data;
        console.log('Search Invoices:', invoices.value);
    } catch (error) {
        console.error('Error searching invoices:', error);
    }
};

const getInvoices = async () => {
    try {
        let response = await axios.get('/api/get_all_invoices');
        invoices.value = response.data;
        console.log('Invoices:', invoices.value);
    } catch (error) {
        console.error('Error fetching invoices:', error);
    }
};
</script>

<template>
    <div class="container">
        <div class="invoices">
            <div class="card__header">
                <div>
                    <h2 class="invoice__title">Invoices</h2>
                </div>
                <div>
                    <a class="btn btn-secondary" @click="newInvoice">
                        New Invoice
                    </a>
                </div>
            </div>

            <div class="table card__content">
                <div class="table--filter">
                    <span class="table--filter--collapseBtn">
                        <i class="fas fa-ellipsis-h"></i>
                    </span>
                    <div class="table--filter--listWrapper">
                        <ul class="table--filter--list">
                            <li>
                                <p class="table--filter--link table--filter--link--active">
                                    All
                                </p>
                            </li>
                            <li>
                                <p class="table--filter--link">
                                    Paid
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="table--search">
                    <div class="table--search--wrapper">
                        <select class="table--search--select" name="" id="">
                            <option value="">Filter</option>
                        </select>
                    </div>
                    <div class="relative">
                        <i class="table--search--input--icon fas fa-search"></i>
                        <input v-model="searchInvoice" class="table--search--input" type="text" placeholder="Search invoice">
                    </div>
                </div>

                <div class="table--heading">
                    <p>ID</p>
                    <p>Date</p>
                    <p>Number</p>
                    <p>Customer</p>
                    <p>Due Date</p>
                    <p>Total</p>
                </div>

                <div v-if="invoices.length > 0">
                    <div v-for="invoice in invoices" :key="invoice.id" class="table--items">
                        <a href="#" class="table--items--transactionId" @click="onShow(invoice.id)">#{{ invoice.id }}</a>
                        <p>{{ invoice.date }}</p>
                        <p>#{{ invoice.number }}</p>
                        <p>{{ invoice.customer ? invoice.customer.firstname : 'N/A' }}</p>
                        <p>{{ invoice.due_date }}</p>
                        <p> $ {{ invoice.total }}</p>
                    </div>
                </div>
                <div v-else>
                    No invoices available.
                </div>
            </div>
        </div>
    </div>
</template>
