<template>
    <DefaultLayout>
        <div class="home flex md:flex-row flex-col h-full w-full">
            <div class="home__text px-3">
                <a :href="`/${$page.props.locale}/`">
                    <img
                        alt="Site logo"
                        class="home__logo"
                        src="../../images/logo.webp"
                    />
                </a>
                <p class="home__description" v-if="text.text">
                    {{ text.text }}
                </p>
                <p class="home__description" v-else>
                    Project on designing residential settlements for internally
                    displaced persons and people who lost their homes due to military
                    actions in the territory of Ukraine.
                </p>
            </div>
            <div class="home__partners">
                <img
                    alt="Site partner"
                    class="partners__img"
                    src="../../images/np5_house_image.webp"
                />
                <div class="py-7 w-full">
                    <ul class="flex flex-row justify-end partners__logos items-center">
                        <li class="partners__item">
                            <img
                                alt="USPP"
                                class="partners__logo"
                                src="../../images/USPP_LOGO.png"
                            />
                        </li>
                        <li class="partners__item">
                            <img
                                alt="NP5"
                                class="partners__logo"
                                src="../../images/NP5_LOGO.png"
                            />
                        </li>
                        <li class="partners__item">
                            <img
                                alt="STANDPOINT"
                                class="partners__logo"
                                src="../../images/STANDPOINT_LOGO.png"
                            />
                        </li>
                        <li class="partners__item">
                            <a href="https://www.facebook.com/fnv.com.ua" target="_blank">
                                <img
                                    alt="NeuroVision"
                                    class="partners__logo"
                                    src="../../images/NeuroVision.png"
                                />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>

<script>
// @ is an alias to /src
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    name: "HomePage",
    components: {
        DefaultLayout,
    },
    props: {
        text: [Array, Object]
    }
};
</script>
