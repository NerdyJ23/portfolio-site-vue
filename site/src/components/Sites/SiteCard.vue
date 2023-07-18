<template>
	<v-card>
		<v-card-title>{{ name }}</v-card-title>
		<v-card-text> {{ description }}</v-card-text>
		<v-card-actions>
			<v-btn v-if="url" :href="`https://${url}`">To Site</v-btn>
		</v-card-actions>
	</v-card>
</template>
<script>
export default {
	name: "SiteCard",
	props: {
		name: {
			type: String,
			required: true
		},
		description: {
			type: String,
			required: false,
			default: ""
		},
		url: {
			type: String,
			required: false,
			default: null
		}

	}
}
</script>