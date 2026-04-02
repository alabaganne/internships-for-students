<template>
  <div class="min-h-screen bg-gray-50 text-gray-900">
    <header class="border-b border-gray-200 bg-white/95 backdrop-blur">
      <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <inertia-link href="/" class="flex items-center space-x-3">
          <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shadow-sm border border-blue-100">
            <icon name="briefcase" class="h-5 w-5" />
          </div>
          <div>
            <div class="text-xl font-extrabold tracking-tight">Qodwa</div>
            <div class="text-xs text-gray-500 uppercase tracking-wide">Internships platform</div>
          </div>
        </inertia-link>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600">
          <inertia-link href="/about" class="hover:text-gray-900 transition">About</inertia-link>
          <inertia-link href="/contact" class="hover:text-gray-900 transition">Contact</inertia-link>
          <inertia-link :href="route('login')" class="hover:text-gray-900 transition">Login</inertia-link>
          <inertia-link :href="route('register')" class="px-4 py-2 rounded-lg bg-gray-900 text-white hover:bg-gray-800 transition shadow-sm">
            Create account
          </inertia-link>
        </nav>
      </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 pt-16 pb-12 lg:pt-24 lg:pb-20">
      <div class="grid lg:grid-cols-2 gap-10 items-center">
        <div>
          <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-medium border border-blue-100">
            Built for students, companies, and career teams
          </div>
          <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
            Find internships with more clarity, speed, and trust.
          </h1>
          <p class="mt-6 text-lg text-gray-600 max-w-2xl leading-8">
            Qodwa helps students discover relevant internships, apply with confidence, and connect directly with companies — while giving employers a cleaner way to manage applicants and opportunities.
          </p>

          <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <inertia-link :href="route('register')" class="px-6 py-3 rounded-lg bg-gray-900 text-white font-semibold text-center hover:bg-gray-800 transition shadow-sm">
              Get started
            </inertia-link>
            <inertia-link :href="route('login')" class="px-6 py-3 rounded-lg bg-white border border-gray-200 text-gray-800 font-semibold text-center hover:bg-gray-50 transition shadow-sm">
              Sign in
            </inertia-link>
          </div>

          <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
            <card v-for="stat in stats" :key="stat.label">
              <div class="p-5">
                <div class="text-sm text-gray-500 uppercase tracking-wide">{{ stat.label }}</div>
                <div class="mt-2 text-3xl font-extrabold">{{ stat.value }}</div>
              </div>
            </card>
          </div>
        </div>

        <div class="lg:pl-8">
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 border-b bg-gray-50">
              <div class="text-sm uppercase text-gray-500 font-medium">Platform overview</div>
              <div class="mt-1 text-2xl font-extrabold">A cleaner internship experience</div>
            </div>
            <div class="p-6 space-y-4">
              <div v-for="feature in heroFeatures" :key="feature.title" class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                <div class="h-11 w-11 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
                  <icon :name="feature.icon" class="h-5 w-5" />
                </div>
                <div>
                  <div class="font-semibold text-gray-900">{{ feature.title }}</div>
                  <p class="mt-1 text-sm text-gray-600 leading-6">{{ feature.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-8 lg:py-12">
      <div class="grid md:grid-cols-3 gap-6">
        <card v-for="audience in audiences" :key="audience.title">
          <div class="p-6">
            <div class="h-12 w-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5">
              <icon :name="audience.icon" class="h-6 w-6" />
            </div>
            <h2 class="text-xl font-bold">{{ audience.title }}</h2>
            <p class="mt-3 text-gray-600 leading-7">{{ audience.description }}</p>
          </div>
        </card>
      </div>
    </section>

    <section class="bg-white border-y border-gray-200 mt-8">
      <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="max-w-3xl">
          <div class="text-sm uppercase tracking-wide text-gray-500 font-medium">How it works</div>
          <h2 class="mt-3 text-3xl md:text-4xl font-extrabold tracking-tight">A simple workflow from discovery to decision</h2>
          <p class="mt-4 text-gray-600 text-lg leading-8">Qodwa keeps the process straightforward: discover opportunities, apply with confidence, and manage communication in one clean experience.</p>
        </div>

        <div class="mt-10 grid md:grid-cols-3 gap-6">
          <card v-for="step in steps" :key="step.number">
            <div class="p-6">
              <div class="h-10 w-10 rounded-full bg-gray-900 text-white flex items-center justify-center text-sm font-bold">{{ step.number }}</div>
              <h3 class="mt-5 text-xl font-bold">{{ step.title }}</h3>
              <p class="mt-3 text-gray-600 leading-7">{{ step.description }}</p>
            </div>
          </card>
        </div>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16">
      <div class="grid lg:grid-cols-2 gap-6">
        <card title="Why students like it" subtitle="Designed to reduce friction and make applications feel manageable.">
          <div class="p-6 space-y-4">
            <div v-for="item in studentBenefits" :key="item.title" class="flex items-start space-x-4">
              <div class="mt-1 h-9 w-9 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
                <icon :name="item.icon" class="h-4 w-4" />
              </div>
              <div>
                <div class="font-semibold">{{ item.title }}</div>
                <div class="text-sm text-gray-600 mt-1 leading-6">{{ item.description }}</div>
              </div>
            </div>
          </div>
        </card>

        <card title="Why companies use it" subtitle="A simpler pipeline for publishing internships and reviewing candidates.">
          <div class="p-6 space-y-4">
            <div v-for="item in companyBenefits" :key="item.title" class="flex items-start space-x-4">
              <div class="mt-1 h-9 w-9 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
                <icon :name="item.icon" class="h-4 w-4" />
              </div>
              <div>
                <div class="font-semibold">{{ item.title }}</div>
                <div class="text-sm text-gray-600 mt-1 leading-6">{{ item.description }}</div>
              </div>
            </div>
          </div>
        </card>
      </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-20">
      <div class="rounded-3xl bg-gray-900 text-white px-8 py-10 md:px-12 md:py-14 shadow-xl">
        <div class="max-w-3xl">
          <div class="text-sm uppercase tracking-wider text-gray-300 font-medium">Ready to launch?</div>
          <h2 class="mt-3 text-3xl md:text-4xl font-extrabold tracking-tight">Start using Qodwa today.</h2>
          <p class="mt-4 text-gray-300 text-lg leading-8">
            Whether you're searching for your next internship or managing opportunities for your company, Qodwa gives you a clean, focused workspace to move faster.
          </p>
          <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <inertia-link :href="route('register')" class="px-6 py-3 rounded-lg bg-white text-gray-900 font-semibold text-center hover:bg-gray-100 transition">
              Create your account
            </inertia-link>
            <inertia-link :href="route('login')" class="px-6 py-3 rounded-lg border border-gray-700 text-white font-semibold text-center hover:bg-gray-800 transition">
              Login
            </inertia-link>
          </div>
        </div>
      </div>
    </section>

    <footer class="border-t border-gray-200 bg-white">
      <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 text-sm text-gray-500">
        <div>
          <div class="font-semibold text-gray-800">Qodwa</div>
          <div class="mt-1">A streamlined internship platform for students and companies.</div>
        </div>
        <div class="flex items-center gap-6">
          <inertia-link href="/about" class="hover:text-gray-800">About</inertia-link>
          <inertia-link href="/contact" class="hover:text-gray-800">Contact</inertia-link>
          <a href="https://www.linkedin.com/in/alabaganne/" target="_blank" class="hover:text-gray-800">Built by Ala Baganne</a>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import EmptyLayout from "@/Layouts/Empty";

export default {
  layout: EmptyLayout,
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },
  data() {
    return {
      stats: [
        { label: "Students", value: "1k+" },
        { label: "Companies", value: "100+" },
        { label: "Open roles", value: "250+" },
        { label: "Applications", value: "5k+" },
      ],
      heroFeatures: [
        {
          icon: "briefcase",
          title: "Discover relevant opportunities",
          description: "Browse internships across technology, business, design, and engineering with a more structured, focused experience.",
        },
        {
          icon: "user-group",
          title: "Apply and track with less friction",
          description: "Students can move from exploration to application without getting lost in scattered forms and unclear processes.",
        },
        {
          icon: "mail",
          title: "Connect directly with companies",
          description: "Built-in communication and applicant management make the hiring flow simpler for both sides.",
        },
      ],
      audiences: [
        {
          icon: "user-group",
          title: "For students",
          description: "Find internships that actually match your skills, field, and ambition — then apply through a cleaner, more professional flow.",
        },
        {
          icon: "office-building",
          title: "For companies",
          description: "Publish internship opportunities, review applications faster, and manage candidates from one structured dashboard.",
        },
        {
          icon: "document-text",
          title: "For career teams",
          description: "Support employability initiatives with a platform that makes internships easier to discover, organize, and promote.",
        },
      ],
      steps: [
        {
          number: "01",
          title: "Explore",
          description: "Students browse opportunities by role, company, and field to focus on internships that actually fit their goals.",
        },
        {
          number: "02",
          title: "Apply",
          description: "Applications stay simple and structured, giving candidates a better chance to present themselves clearly.",
        },
        {
          number: "03",
          title: "Connect",
          description: "Companies review applicants, communicate with candidates, and move the process forward from one place.",
        },
      ],
      studentBenefits: [
        {
          icon: "search",
          title: "Better discovery",
          description: "Browse internships in a way that feels curated instead of chaotic.",
        },
        {
          icon: "document-text",
          title: "Clearer applications",
          description: "Apply with the right information in the right place, without unnecessary complexity.",
        },
        {
          icon: "mail",
          title: "Direct communication",
          description: "Keep conversations and updates closer to the application itself.",
        },
      ],
      companyBenefits: [
        {
          icon: "briefcase",
          title: "Publish opportunities quickly",
          description: "Create and manage internship listings through a clean, lightweight workflow.",
        },
        {
          icon: "folder",
          title: "Review candidates efficiently",
          description: "See applications in one place and spend less time navigating clutter.",
        },
        {
          icon: "office-building",
          title: "Present your brand better",
          description: "Offer candidates a more polished first impression than generic job boards.",
        },
      ],
    };
  },
};
</script>
