<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Hero from '@/Components/Dashboard/Hero.vue';

const props = defineProps({
    joblist: Array
})


</script>

<template>
  <Head title="JobSearch" />
  <AuthenticatedLayout>
    <Hero/>
    <!-- Main Content -->
    <div class="container-fluid py-5">
        <!-- Job Listings -->
        <div class="job-listings d-flex">
            <!-- Job Card 1 -->
            <div class="job-card" v-for="job in joblist" :key="job.id">
                <div class="d-flex gap-4">
                    <div class="company-logo green">
                        <img src="logo-3.svg" alt="DWebPixel">
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2 class="h5 fw-semibold mb-1">{{ job.title }}</h2>
                                <p class="text-muted mb-0">{{ job.company_name }}</p>
                            </div>
                            <div>
                                <span class="tag">{{ job.extra_info }}</span>
                            </div>
                        </div>

                        <div class="job-meta d-flex gap-4">
                            <span><i class="far fa-clock"></i>{{ job.experience }}</span>
                            <span><i class="far fa-money-bill-alt"></i>{{ job.salary }}</span>
                            <span><i class="fas fa-location-dot"></i>{{ job.location }}</span>
                        </div>

                        <p class="mt-3 text-muted">
                            {{ job.description }}
                        </p>

                        <div class="tech-stack" v-for="skill in job.skill" :key="skill.id">
                            <span class="tech-tag">{{ skill }}</span>
                        </div>

                        <div class="time-ago">
                            2 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>