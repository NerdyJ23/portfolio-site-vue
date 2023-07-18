<template>
	<v-timeline>
		<v-timeline-item v-for="site in sites">
			<template v-slot:opposite>
				{{ site.year }}
			</template>
			<site-card :name="site.name" :description="site.description" />
		</v-timeline-item>
	</v-timeline>
</template>
<script>
import SiteCard from "./SiteCard.vue";

export default {
	name: "SiteTimeline",
	components: {
		SiteCard
	},
	data() {
		return {
			sites: []
		}
	},
	methods: {
		init() {

		},
		async loadSiteList() {

		}
	}
}
</script>