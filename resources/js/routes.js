import BuyerLayout from './components/Client/Buyer/Index.vue'
import Main from './components/Client/Buyer/Main.vue'
import MerchantDetails from './components/Client/Buyer/MerchantDetail.vue'
import Search from './components/Client/Buyer/Search.vue'

import SellerLayout from './components/Client/Seller/Index.vue'
import MerchantProfile from './components/Client/Seller/Toko-Profil.vue'
import MerchantSetting from './components/Client/Seller/Toko-Pengaturan.vue'
import MerchantProductCreate from './components/Client/Seller/Daganganku-Buat.vue'
import MerchantProduct from './components/Client/Seller/Daganganku-Lihat.vue'
import MerchantPerformance from './components/Client/Seller/Bisnis-Performa.vue'

import SellerAuth from './components/Client/Seller/Auth.vue'
import SellerLogin from './components/Client/Seller/Login.vue'
import SellerRegister from './components/Client/Seller/Register.vue'

import AdminLayout from './components/Admin/Index.vue'
import PTypeIndex from './components/Admin/ProductTypeIndex.vue'
import PTypeForm from './components/Admin/ProductTypeForm.vue'
import CatgIndex from './components/Admin/CategoriesIndex.vue'
import CatgForm from './components/Admin/CategoriesForm.vue'

import LoginForm from './components/Admin/Login.vue'

import MobileLoading from './components/mobile/loading.vue'

export const routes = [
  {
    path: '',
    component: BuyerLayout,
    children: [
      {
        name: 'main',
        path: '/',
        component: Main
      },
      {
        name: 'mdetails',
        path: '/mdetails',
        component: MerchantDetails
      },
      {
        name: 'msearch',
        path: '/msearch',
        component: Search
      }
    ]
  },
  {
    path: '/seller',
    component: SellerLayout,
    children: [
      {
        name: 'mprofile',
        path: '/seller/mprofile',
        component: MerchantProfile
      },
      {
        name: 'msetting',
        path: '/seller/msetting',
        component: MerchantSetting
      },
      {
        name: 'maddProduct',
        path: '/seller/maddproduct',
        component: MerchantProductCreate
      },
      {
        name: 'mlistProduct',
        path: '/seller/mlistproduct',
        component: MerchantProduct
      },
      {
        name: 'mperformance',
        path: '/seller/mperformance',
        component: MerchantPerformance
      }
    ],
    meta: {
      auth: true
    }
  },
  {
    path: '/auth/seller',
    component: SellerAuth,
    children: [
      {
        name: 'slogin',
        path: '/auth/seller/login',
        component: SellerLogin
      },
      {
        name: 'sregister',
        path: '/auth/seller/register',
        component: SellerRegister
      }
    ],
    meta: {
      guest: true
    }
  },
  {
    path: '/admin',
    component: AdminLayout,
    children: [
      {
        name: 'ptypeIndex',
        path: '/admin/ptype',
        component: PTypeIndex
      },
      {
        name: 'ptypeCreate',
        path: '/admin/ptypecreate',
        component: PTypeForm
      },
      {
        name: 'ptypeEdit',
        path: '/admin/ptypeedit',
        component: PTypeForm
      },
      {
        name: 'catgIndex',
        path: '/admin/catg',
        component: CatgIndex
      },
      {
        name: 'catgCreate',
        path: '/admin/catgcreate',
        component: CatgForm
      },
      {
        name: 'catgEdit',
        path: '/admin/catgedit',
        component: CatgForm
      }
    ]
  },
  {
    name: 'adminLogin',
    path: '/admin/login',
    component: LoginForm
  },
  {
    name: 'mobileLoading',
    path: '/mobile/loading',
    component: MobileLoading
  }
]