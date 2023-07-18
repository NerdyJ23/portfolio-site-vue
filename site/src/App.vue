<template>
	<v-app>
		<v-main>
			<div id="app">
			  <nav>
				<router-link to="/">Home</router-link> |
				<router-link to="/about">About</router-link>
			  </nav>
			  <router-view/>
			</div>
		</v-main>
	</v-app>
</template>