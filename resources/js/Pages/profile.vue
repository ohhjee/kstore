<template>
  <div>
    <Head title="Profile"> </Head>

    <authenticated-layout>
      {{ $page.props.flash.message }}
      <div class="mt-[3rem] px-4" v-if="loading">
        <div class="h-[20vh] md:h-[40vh] lg:h-[30vh] w-full mx-auto rounded">
          <div class="animate-pulse flex h-full w-full space-x-5 mx-auto">
            <div class="bg-gray-300 w-[50vw] sm:w-[30vw] md:w-[20vw] h-full"></div>
            <div class="space-y-4 w-full">
              <div class="bg-gray-300 h-4 rounded w-2/4 lg:w-1/4"></div>
              <div class="w-2/4">
                <div class="bg-gray-300 h-4 rounded w-full"></div>
              </div>
              <div class="w-3/4">
                <div class="bg-gray-300 h-4 rounded w-full"></div>
              </div>
              <div class="w-3/4">
                <div class="bg-gray-300 h-4 rounded w-full"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 animate-pulse">
          <div class="flex items-center justify-between">
            <div class="bg-gray-300 h-4 rounded w-2/4 lg:w-1/4"></div>
            <div
              class="bg-gray-300 py-1 rounded text-white capitalize font-semibold h-8 w-12"
            ></div>
          </div>

          <div class="mt-4">
            <form class="w-full border space-y-5">
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <!-- <input type="text" :value="user?.name" class="w-full" /> -->
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <!-- <input type="text" :value="user?.email" class="w-full" /> -->
                </div>
              </div>
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <!-- <input type="text" :value="user?.email" class="w-full" /> -->
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <!-- <input type="text" :value="user?.email" class="w-full" /> -->
                </div>
              </div>

              <div class="flex items-end justify-end">
                <div class="h-[32px] w-[125px] bg-gray-300 rounded"></div>
              </div>
            </form>
          </div>
        </div>
        <div></div>
      </div>

      <div class="mt-[3rem] px-4" v-else>
        <div class="h-[20vh] md:h-[40vh] lg:h-[30vh] w-full rounded">
          <div class="flex h-full w-full space-x-5">
            <div
              class="bg-gray-300 w-[50vw] sm:w-[30vw] lg:w-[20vw] md:w-[40vw] h-full"
            ></div>
            <!-- {{ user }} -->
            <div class="space-y-4 w-full">
              <div class="h-4 rounded w-full leading-3 lg:w-2/4">
                {{ user?.name }}
              </div>
              <div class="h-4 rounded w-full leading-3">{{ user?.email }}</div>
              <div class="bg-gray-300 h-4 rounded w-3/4"></div>
              <div class="bg-gray-300 h-4 rounded w-3/4"></div>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <div class="flex items-center justify-between">
            <div>Edit personal details</div>
            <div>
              <button
                @click="show"
                class="bg-gray-400 py-1 rounded text-white capitalize font-semibold px-4"
              >
                edit
              </button>
            </div>
          </div>

          <div class="mt-4">
            <div class="w-full border space-y-5" v-if="hidForm">
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input type="text" disabled :value="user?.name" class="w-full" />
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input type="text" :value="user?.email" disabled class="w-full" />
                </div>
              </div>
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center mt-[1rem]"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    disabled
                    :value="user?.password"
                    class="w-full"
                    placeholder=" Password"
                  />
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    :value="user?.password"
                    disabled
                    class="w-full"
                    placeholder="Repeat Password"
                  />
                </div>
              </div>
            </div>
            <form
              name="editForm"
              class="w-full border space-y-5"
              v-if="showForm"
              @submit.prevent="UpdateUser"
            >
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    placeholder="name"
                    v-model="form.name"
                    class="w-full"
                  />
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    placeholder="email"
                    v-model="form.email"
                    class="w-full"
                  />
                </div>
              </div>
              <div
                class="flex flex-col md:flex-row space-y-3 md:space-y-0 w-full justify-between items-center mt-[1rem]"
              >
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    :value="user?.password"
                    class="w-full"
                    placeholder=" Password"
                  />
                </div>
                <div class="w-full md:w-5/12 bg-gray-300 h-[42px] rounded">
                  <input
                    type="text"
                    :value="user?.password"
                    class="w-full"
                    placeholder="Repeat Password"
                  />
                </div>
              </div>

              <div class="flex items-end justify-end">
                <div>
                  <button
                    :class="
                      form.processing && 'cursor-not-allowed bg-gray-400 text-gray-900'
                    "
                    :disabled="form.processing"
                    class="bg-blue-400 flex items-center justify-center py-1 rounded text-white capitalize font-semibold px-4"
                  >
                    Save update
                    <span v-if="form.processing">
                      <div class="text-center">
                        <div role="status">
                          <svg
                            aria-hidden="true"
                            class="inline ml-2 w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                              fill="currentColor"
                            />
                            <path
                              d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                              fill="currentFill"
                            />
                          </svg>
                          <span class="sr-only">Loading...</span>
                        </div>
                      </div>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div></div>
      </div>
    </authenticated-layout>
  </div>
</template>

<script lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { useForm, Head } from "@inertiajs/vue3";
import { defineComponent, onMounted, ref } from "vue";

export default defineComponent({
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
  components: { AuthenticatedLayout, Head },
  setup(props) {
    const form = useForm({
      name: props.user.name,
      email: props.user.email,
    });
    const loading = ref(true);
    setTimeout(() => {
      loading.value = false;
    }, 5000);
    const showForm = ref(false);
    const hidForm = ref(true);
    const show = (e) => {
      //   console.log(e.target.name);
      showForm.value = true;
      hidForm.value = false;
    };

    const UpdateUser = () => {
      form.put(route("profile.update"));
      showForm.value = false;
      hidForm.value = true;
    };
    return { loading, show, showForm, hidForm, UpdateUser, form };
  },
});
</script>

<style scoped></style>
