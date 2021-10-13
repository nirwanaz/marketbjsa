<template>
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item dropdown">
        <div class="dropdown-menu show w-100">
          <p class="dropdown-header">Tokoku</p>
          <router-link :to="{ name:'mprofile' }" class="dropdown-item">
            Profil Toko
          </router-link>
          <router-link :to="{ name:'msetting' }" class="dropdown-item">
            Pengaturan Toko
          </router-link>
          <div class="dropdown-divider"></div>
          <p class="dropdown-header">Daganganku</p>
          <router-link :to="{ name:'maddProduct' }" class="dropdown-item">
            Buat Dagangan
          </router-link>
          <router-link :to="{ name:'mlistProduct' }" class="dropdown-item">
            Dagangan
          </router-link>
          <div class="dropdown-divider"></div>
          <p class="dropdown-header">Bisnis</p>
          <router-link :to="{ name: 'mperformance' }" class="dropdown-item">
            Performa Bisnis
          </router-link>
        </div>
      </li>
    </ul>
  </div>
</template>