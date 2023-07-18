<template>
	<v-card>
		<v-card-title>{{ name }}</v-card-title>
		<v-card-text> {{ description }}</v-card-text>
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
			required: false
		}
	}
}
</script>