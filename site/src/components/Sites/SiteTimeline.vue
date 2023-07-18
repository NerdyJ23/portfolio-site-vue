<template>
	<v-timeline>
		<v-timeline-item v-for="site in sites">
			<template v-slot:opposite>
				{{ site.date }}
			</template>
			<site-card :name="site.name" :description="site.description" :url="site.url"/>
		</v-timeline-item>
	</v-timeline>
</template>
<script>
import SiteCard from "./SiteCard.vue";
import cakeApi from "@/services/cakeApi";

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
	mounted() {
		this.init();
	},
	methods: {
		init() {
			this.loadSiteList();
		},
		async loadSiteList() {
			const response = await cakeApi.listSites();

			if (response.status === 200) {
				this.sites = response.data.result;
			}
		}
	}
}
</script>