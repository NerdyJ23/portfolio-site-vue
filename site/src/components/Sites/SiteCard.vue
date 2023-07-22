<template>
	<v-card>
		<v-img v-if="images.length" :src="`https://jessprogramming.com:8080/${images[0]}`"/>
		<v-card-title>{{ name }}</v-card-title>
		<v-card-text>
			<div>
				<span>
					{{ description }}
				</span>
			</div>
			<div>
				<strong>Languages:</strong>
				<span v-if="languages" v-for="lang, index in languages">
					{{ lang.name }}{{ index !== languages.length - 1 ? ', ' : '' }}
				</span>
			</div>
		</v-card-text>
		<v-card-actions>
			<v-btn v-if="url" :href="`https://${url}`" target="_blank">To Site</v-btn>
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
		},
		languages: {
			type: Array,
			required: false,
			default: null
		},
		images: {
			type: Array,
			required: false,
			default: null
		}

	}
}
</script>