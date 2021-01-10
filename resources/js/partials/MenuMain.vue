<template>
    <nav>
        <ul>
            <router-link to="/home" tag="li" active-class="active" exact>
                <a class="nav-link">Home</a>
            </router-link>
            <router-link to="/about" tag="li" active-class="active">
                <a class="nav-link">About</a>
            </router-link>
        </ul>
    </nav>
</template>

<script>
    export default {
    };
</script>
