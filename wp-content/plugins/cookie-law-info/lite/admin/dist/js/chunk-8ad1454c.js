(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-8ad1454c"],{"02dd":function(t,e,i){"use strict";i("6683")},"18fb":function(t,e,i){},"2c82":function(t,e,i){"use strict";i("18fb")},"3ce8":function(t,e,i){},"407f":function(t,e,i){},"4a95":function(t,e,i){t.exports=i.p+"img/status.svg"},"50c3":function(t,e,i){t.exports=i.p+"img/arrow-right.svg"},"51bf":function(t,e,i){"use strict";i("407f")},5544:function(t,e,i){t.exports=i.p+"img/location.svg"},6683:function(t,e,i){},"69d7":function(t,e,i){"use strict";i("d3d1")},"78d0":function(t,e,i){t.exports=i.p+"img/reg.svg"},"791f":function(t,e,i){"use strict";i("3ce8")},"922a":function(t,e,i){"use strict";i("e2ea")},9573:function(t,e,i){"use strict";i.r(e);var s=function(){var t=this,e=t._self._c;return"/dashboard/plans"===t.$route.path?e("div",[e("transition",{attrs:{name:"fade"}},[e("router-view")],1)],1):e("div",{staticClass:"cky-section cky-section-dashboard cky-zero--padding cky-zero--margin"},[e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("notice-migration"),e("cky-connect-success")],1)]),e("div",{class:[t.connected?"cky-row":"cky-column"]},[e("div",{class:[t.connected?"cky-col-9":"cky-col-10"]},[e("cky-connect-notice"),e("cky-dashboard-overview"),!t.connected||t.loading||t.syncing?t._e():e("div",{staticClass:"cky-section-content"},[e("div",{staticClass:"cky-section-row"},[e("div",{staticClass:"cky-col-7"},[e("cky-scan-summary")],1),e("div",{staticClass:"cky-col-5"},[e("cky-consent-chart")],1)]),e("div",{staticClass:"cky-section-row"},[e("cky-pageview-graph")],1)])],1),t.connected&&!t.loading?e("div",{staticClass:"cky-section-upgrade cky-col-3"},[t.freePlan&&!t.syncing?e("upgrade-widget"):t._e(),e("cky-faq-widget")],1):t._e()])])},n=[],a=function(){var t=this,e=t._self._c;return e("div",{staticClass:"cky-scan-summary-section"},[e("cky-card",{attrs:{title:t.$i18n.__("Cookie Summary","cookie-law-info"),loading:t.cardLoader},scopedSlots:t._u([{key:"body",fn:function(){return[e("div",{staticClass:"cky-stats-section"},t._l(t.statistics,(function(t){return e("cky-stats-card",{key:t.slug,attrs:{statistics:t}})})),1)]},proxy:!0}])})],1)},o=[],c=i("f9c4"),r=i("9610"),l=function(){var t=this,e=t._self._c;return e("div",{staticClass:"cky-stats-col"},[e("div",{staticClass:"cky-row"},[t.statistics.icon?e("div",{staticClass:"cky-stats-icon"},[e("cky-icon",{attrs:{icon:t.statistics.icon,width:t.iconWidth,color:t.iconColor}})],1):t._e(),e("div",{staticClass:"cky-stats-content"},[e("div",{staticClass:"cky-stats-title"},[t._v(t._s(t.statistics.title))]),"lastscan"!==t.statistics.slug?e("div",{staticClass:"cky-stats-count"},[t._v(t._s(t.statistics.count))]):e("div",{staticClass:"cky-stats-count"},[t.successScan.date&&t.account.connected?e("span",{staticStyle:{"font-size":"14px"}},[t._v(" "+t._s(t.successScan.date.date||t.$i18n.__("Not available","cookie-law-info"))+" "),e("span",[t._v(t._s(t.successScan.date.time||""))])]):e("span",[t._v(t._s(t.$i18n.__("Not available","cookie-law-info")))])])])])])},d=[],u=i("1f3d"),p={components:{CkyIcon:u["a"]},name:"CkyStatsCard",props:{statistics:Object,iconWidth:{type:String,default:"30"},iconColor:{type:String,default:"#000000"}},computed:{getLoadingClass(){return{"cky-loading":this.loading}},account(){return this.getOption("account")},successScan(){return this.getInfo("success_scan")||{}}}},y=p,k=(i("69d7"),i("2877")),f=Object(k["a"])(y,l,d,!1,null,null,null),g=f.exports,h={name:"CkyScanSummary",components:{CkyCard:r["a"],CkyStatsCard:g},data(){return{loading:!0,stats:[{slug:"cookies",icon:"cookie",title:this.$i18n.__("Total cookies","cookie-law-info"),count:0},{slug:"categories",icon:"categories",title:this.$i18n.__("Categories","cookie-law-info"),count:0},{slug:"lastscan",icon:"scan",title:this.$i18n.__("Last successful scan (UTC)","cookie-law-info"),count:"Not available"},{slug:"pages",icon:"pages",title:this.$i18n.__("Pages scanned","cookie-law-info"),count:0}]}},methods:{async getstats(){this.loading=!0;try{const t=await c["a"].get({path:"dashboard/summary"});t&&this.stats.forEach((function(e){const i=t[e.slug]?t[e.slug]:0;e.count=i})),this.loading=!1}catch(t){console.error(t)}}},computed:{statistics(){return this.stats},cardLoader(){return!this.$store.state.settings.info||this.loading}},created(){this.getstats()}},_=h,w=(i("d641"),Object(k["a"])(_,a,o,!1,null,null,null)),b=w.exports,v=function(){var t=this,e=t._self._c;return t.showNotice?e("cky-notice",{ref:"ReviewNotice",staticClass:"cky-notice-migration",attrs:{type:"info"}},[e("div",{staticClass:"cky-row cky-align-center"},[e("div",{staticClass:"cky-col-12"},[e("div",{staticClass:"cky-align-center"},[e("p",{staticStyle:{"margin-bottom":"5px","margin-right":"15px"}},[e("b",[t._v(t._s(t.message)+" ")])]),e("a",{staticClass:"cky-button cky-button-outline",attrs:{href:t.legacyURL}},[t._v(" "+t._s(t.$i18n.__("Switch back to old UI","cookie-law-info"))+" ")])])])])]):t._e()},C=[],m=i("462b"),$={name:"NoticeMigration",components:{CkyNotice:m["a"]},data(){return{showNotice:!!window.ckyAppNotices.migration_notice,legacyURL:window.ckyGlobals.legacyURL}},computed:{message(){return this.showNotice&&window.ckyAppNotices.migration_notice.message||""}},methods:{async removeNotice(){await c["a"].post({path:"/settings/notices/migration_notice"}),this.$refs.ReviewNotice.isShown=!1},async switchToLegacy(){await c["a"].post({path:"/settings/legacy"})}},mounted(){}},S=$,x=(i("02dd"),Object(k["a"])(S,v,C,!1,null,null,null)),L=x.exports,A=i("919d"),I=function(){var t=this,e=t._self._c;return t.account.connected&&!t.syncing&&t.pluginStatus?e("cky-notice",{staticClass:"cky-connect-notice",attrs:{type:"default"}},[e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("h4",{staticClass:"cky-admin-notice-header"},[e("cky-icon",{attrs:{icon:"successCircle",color:"#00aa63",width:"16px"}}),t._v(" "+t._s(t.$i18n.__("Your website is connected to CookieYes web app","cookie-law-info"))+" ")],1),e("div",{staticClass:"cky-connect-notice-message"},[e("p",[t._v(" "+t._s(t.$i18n.__("You can access all the plugin settings (Cookie Banner, Cookie Manager, Languages and Policy Generators) on the web app and unlock new features like Cookie Scanner and Consent Log.","cookie-law-info"))+" ")])]),e("button",{staticClass:"cky-button cky-external-link",on:{click:function(e){return e.preventDefault(),t.$router.redirectToApp()}}},[t._v(" "+t._s(t.$i18n.__("Go to Web App","cookie-law-info"))+" ")])])])]):t.tablesMissing?t._e():e("div",{staticClass:"cky-connect-notice cky-connect-notice-disabled",attrs:{type:"default"}},[e("div",{staticClass:"cky-row cky-align-center"},[e("div",{staticClass:"cky-col-12"},[e("cky-connect-card",{ref:"ckycard",staticClass:"cky-connect-card",attrs:{title:t.$i18n.__("Get started with CookieYes","cookie-law-info"),tagline:t.$i18n.__("Welcome to CookieYes! To become legally compliant for your use of cookies, here’s what you need to do.","cookie-law-info"),showIcon:!0},scopedSlots:t._u([{key:"body",fn:function(){return[e("div",{staticClass:"cky-connect-step cky-row"},[e("div",{staticClass:"cky-connect-icon"},[e("div",{staticClass:"cky-icon-container-dot"},[e("img",{attrs:{src:i("f222")}})]),e("div",{staticClass:"cky-connect-line"})]),e("div",{staticClass:"cky-connect-steps"},[e("p",{staticClass:"cky-connect-step-title"},[t._v(" "+t._s(t.$i18n.__("Activate your cookie banner","cookie-law-info"))+" ")]),e("p",{staticClass:"cky-connect-step-description"},[e("b",[t._v(t._s(t.$i18n.__("Well done!","cookie-law-info")))]),t._v(" 🎉 "+t._s(t.$i18n.__("You have successfully implemented a cookie banner on your website.","cookie-law-info"))+" ")])])]),e("div",{staticClass:"cky-connect-step cky-row"},[e("div",{staticClass:"cky-column"},[e("div",{staticClass:"cky-icon-container-dot"},[e("div",{staticClass:"cky-icon-container"})])]),e("div",{staticClass:"cky-connect-steps"},[e("p",{staticClass:"cky-connect-step-title cky-focus-text"},[t._v(" "+t._s(t.$i18n.__("Connect and scan your website"))+" ")]),e("p",{staticClass:"cky-connect-step-description"},[t._v(" "+t._s(t.$i18n.__("To initiate an automatic cookie scan, you need to connect to the CookieYes web app. By connecting you can: ","cookie-law-info"))+" ")]),e("div",{staticClass:"cky-benefit-description"},[e("div",{staticClass:"cky-benefit-steps"},[e("div",{staticClass:"cky-icon-tiny"},[e("img",{attrs:{src:i("f222")}})]),e("p",{staticClass:"cky-connect-step-description cky-connect-benefits"},[t._v(" "+t._s(t.$i18n.__("Detect cookies and trackers on all web pages","cookie-law-info"))+" ")])]),e("div",{staticClass:"cky-benefit-steps"},[e("div",{staticClass:"cky-icon-tiny"},[e("img",{attrs:{src:i("f222")}})]),e("p",{staticClass:"cky-connect-step-description cky-connect-benefits"},[t._v(" "+t._s(t.$i18n.__("Automatically classify cookies into categories","cookie-law-info"))+" ")])]),e("div",{staticClass:"cky-benefit-steps"},[e("div",{staticClass:"cky-icon-tiny"},[e("img",{attrs:{src:i("f222")}})]),e("p",{staticClass:"cky-connect-step-description cky-connect-benefits"},[t._v(" "+t._s(t.$i18n.__("Generate a detailed cookie declaration","cookie-law-info"))+" ")])])]),e("router-link",{attrs:{to:"dashboard/plans",custom:""},scopedSlots:t._u([{key:"default",fn:function({navigate:i}){return[e("button",{staticClass:"cky-button",on:{click:i}},[t._v(" "+t._s(t.$i18n.__("Connect to Web App","cookie-law-info"))+" ")])]}}])}),e("button",{staticClass:"cky-button cky-later-button",on:{click:t.expandAccordion}},[t._v(" "+t._s(t.$i18n.__("Do it later","cookie-law-info"))+" ")])],1)])]},proxy:!0}])})],1)])])},U=[],P=i("c068"),B=i("2f62"),q=function(){var t=this,e=t._self._c;return t.pluginStatus?e("div",{class:{"cky-card":!0,"cky-cursor-pointer":!t.isExpanded,"cky-aria-expanded":t.isExpanded&&t.showIcon}},[t.title?e("div",{staticClass:"cky-card-header",on:{click:t.expandAccordion}},[e("div",{staticClass:"cky-row cky-space-between"},[e("div",{staticClass:"cky-title-spacing"},[e("div",{staticClass:"cky-row"},[e("h5",{staticClass:"cky-card-title"},[t._v(" "+t._s(t.title)+" ")])]),t.tagline?e("p",{staticClass:"cky-tagline"},[t._v(" "+t._s(t.tagline)+" ")]):t._e()]),t.showIcon?e("div",{class:{"cky-card-icon":!0,"cky-arrow-upward":t.isExpanded}},[e("img",{attrs:{src:i("50c3")}})]):t._e()]),t.hasActions?e("div",{staticClass:"cky-card-actions"},[t._t("headerAction")],2):t._e()]):t._e(),t.hasBodySlot?e("div",{class:t.getBodyClass},[t.loading?e("cky-card-loader"):t._t("body")],2):t._e(),t._t("outside"),t.hasFooterSlot?e("div",{staticClass:"cky-card-footer"},[t._t("footer")],2):t._e()],2):t._e()},O=[],R=i("17aa"),E={components:{CkyCardLoader:R["a"]},name:"CkyCard",props:{showIcon:{type:Boolean,default:!1},title:{type:String,required:!1},tagline:{type:String,required:!1,default:""},bodyClass:{type:String,default:""},loading:{type:Boolean,default:!1},fullWidth:{type:Boolean,default:!1}},data(){return{isExpanded:this.$store.state.settings.expand}},computed:{...Object(B["d"])("settings",["expand"]),hasActions(){return!!this.$slots.headerAction},hasBodySlot(){return!!this.$slots.body},hasFooterSlot(){return!!this.$slots.footer},getLoadingClass(){return this.loading?"cky-loading":""},getBodyClass(){return{"cky-card-body":!0,[this.bodyClass]:this.bodyClass}},pluginStatus(){return this.$store.state.settings.status}},methods:{async expandAccordion(){this.isExpanded=!this.isExpanded,this.$store.state.settings.expand=this.isExpanded,await c["a"].post({path:"/settings/expand",data:{expand:this.isExpanded}})}}},T=E,N=Object(k["a"])(T,q,O,!1,null,null,null),W=N.exports,G={name:"CkyConnectNotice",mixins:[P["a"]],components:{CkyNotice:m["a"],CkyIcon:u["a"],CkyConnectCard:W},data(){return{syncing:!1,contents:{connect:this.$i18n.sprintf(this.$i18n.__("Create a free account to connect with %sCookieYes web app%s. After connecting, you can manage all your settings from the web app and access advanced features:","cookie-law-info"),"<b>","</b>"),pageviews:this.$i18n.sprintf(this.$i18n.__('You can continue using the plugin without connecting to the web app if you wish so. Please note that the standalone version of the plugin doesn\'t provide some advanced features. However, it offers unlimited <a href="%s" target="_blank">pageviews</a> in contrast to that of the web app-connected version.',"cookie-law-info"),"https://www.cookieyes.com/documentation/pageview-pricing/")}}},methods:{async removeNotice(){await c["a"].post({path:"/settings/notices/connect_notice",data:{}})},expandAccordion(){this.$refs.ckycard.expandAccordion()}},computed:{...Object(B["d"])("settings",{info:"info",pluginStatus:"status"}),account(){return this.getOption("account")},showNotice(){return!!window.ckyAppNotices.connect_notice},tablesMissing(){return!!this.info.tables_missing}},mounted(){this.account.connected||(this.$root.$on("beforeConnection",()=>{this.syncing=!0}),this.$root.$on("afterConnection",()=>{}),this.$root.$on("afterSyncing",()=>{this.syncing=!1}))}},z=G,j=(i("2c82"),Object(k["a"])(z,I,U,!1,null,null,null)),D=j.exports,M=function(){var t=this,e=t._self._c;return e("cky-card",{staticClass:"cky-upgrade-widget",attrs:{loading:t.cardLoader},scopedSlots:t._u([{key:"body",fn:function(){return[e("div",{staticClass:"cky-row cky-align-center"},[e("div",{staticClass:"cky-col-12"},[e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("h3",{staticClass:"cky-admin-notice-header"},[t._v(" "+t._s(t.content.title)+" ")]),e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("p",{staticClass:"cky-py-2"},[t._v(" "+t._s(t.content.description)+" ")])])])])]),e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("div",{staticClass:"cky-premium-features-list"},[e("ul",t._l(t.content.features,(function(i,s){return e("li",{key:s},[t._v(" "+t._s(i)+" ")])})),0)])])]),e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("div",{staticClass:"cky-align-center cky-py-2"},[e("a",{staticClass:"cky-button cky-button-medium cky-button-icon cky-center",attrs:{href:t.getURL(),target:"_blank"}},[e("cky-icon",{attrs:{icon:"crown",width:"20"}}),t._v(" "+t._s(t.content.cta)+" ")],1),e("div",{staticClass:"cky-2mf"},[e("p",{domProps:{innerHTML:t._s(t.twoMonthFree)}}),e("img",{attrs:{src:i("b94f")}})])])])]),e("div",{staticClass:"cky-row cky-mbg"},[e("img",{attrs:{src:i("dcb3")}}),e("p",[t._v(" "+t._s(t.content.mbg)+" ")])])])])]},proxy:!0}])})},Y=[],F=i("3840"),H={name:"UpgradeWidget",mixins:[P["a"]],components:{CkyCard:r["a"],CkyIcon:u["a"]},data(){return{content:{title:F["a"].__("Upgrade to our best plans as your website grows","cookie-law-info"),description:F["a"].__("Access advanced features and future-proof your business against legal risks.","cookie-law-info"),features:[F["a"].__("Advanced banner customization","cookie-law-info"),F["a"].__("Increased monthly pageviews/month","cookie-law-info"),F["a"].__("Geo-targeted cookie banners","cookie-law-info"),F["a"].__("Scheduled scan for automatic updates","cookie-law-info")],cta:F["a"].__("Upgrade Now","cookie-law-info"),mbg:F["a"].__("15-day money back guarantee","cookie-law-info")},twoMonthFree:this.$i18n.sprintf(this.$i18n.__("2 months free%son annual plans","cookie-law-info"),"<br/>")}},methods:{getURL(){let t=`${window.ckyGlobals.webApp.url}/settings?upgrade_id=${this.account.website_id}&openUpgrade=true&upgrade_source=cypluginupgrade`;return"ultimate"===this.plan.toLowerCase()&&(t="https://www.cookieyes.com/support/?query=enterprise&ref=cypluginupgrade#enterprise"),t}},computed:{account(){return this.getOption("account")},plan(){return!!this.getInfo("plan")&&this.getInfo("plan").name||"free"},cardLoader(){return!this.$store.state.settings.info||this.loading}},async created(){}},V=H,J=(i("922a"),Object(k["a"])(V,M,Y,!1,null,null,null)),Q=J.exports,K=function(){var t=this,e=t._self._c;return e("div",{staticClass:"cky-faq-container"},[e("div",{staticClass:"cky-faq-title"},[e("h4",[t._v(" "+t._s(t.title)+" ")])]),e("cky-accordion",t._l(t.faqs,(function(i){return e("cky-accordion-item",{key:i.id,scopedSlots:t._u([{key:"cky-accordion-trigger",fn:function(){return[e("label",{staticClass:"cky-app-accordion-title"},[t._v(" "+t._s(i.question)+" ")])]},proxy:!0},{key:"cky-accordion-content",fn:function(){return[e("p",[t._v(" "+t._s(i.answer)+" ")])]},proxy:!0}],null,!0)})})),1)],1)},X=[],Z=i("a9f4"),tt=i("b02b"),et={name:"CkyFaqWidget",components:{CkyAccordion:Z["a"],CkyAccordionItem:tt["a"]},data(){return{title:this.$i18n.__("Frequently Asked Questions","cookie-law-info"),faqs:[{id:"faq1",question:this.$i18n.__("How do I customize the cookie consent banner?","cookie-law-info"),answer:this.$i18n.__('You can customize the banner by clicking the "Customize Banner" button on the plugin dashboard. It will take you to the web app settings, where you have several options to customize the banner to your liking.',"cookie-law-info")},{id:"faq2",question:this.$i18n.__("How do I scan web pages for cookies?","cookie-law-info"),answer:this.$i18n.__('Click the "Go to Web App" to access the web app. There, you will find the option to initiate a cookie scan for your website. Our premium plan offers a scheduled scan feature that automates this process for you.',"cookie-law-info")},{id:"faq3",question:this.$i18n.__("What are pageviews?","cookie-law-info"),answer:this.$i18n.__("Pageviews are the number of times the web pages containing CookieYes banner have been loaded or reloaded. This excludes known bot traffic.","cookie-law-info")},{id:"faq4",question:this.$i18n.__("What happens if the monthly pageview limit exceeds?","cookie-law-info"),answer:this.$i18n.__("The cookie banner will no longer be displayed on your site, which will result in non-compliance. You can either upgrade to a higher plan for an increased pageview limit or disconnect your site from the web app.","cookie-law-info")},{id:"faq5",question:this.$i18n.__("What happens if I disconnect my site from the app?","cookie-law-info"),answer:this.$i18n.__("When you disconnect from the web app, you can continue using the plugin. However, this means you will lose your banner customization and access to advanced features.","cookie-law-info")},{id:"faq6",question:this.$i18n.__("How do I disconnect the plugin from the web app?","cookie-law-info"),answer:this.$i18n.__('Go to "Site settings" on the plugin dashboard and click "Disconnect" to disconnect the plugin from the web app.',"cookie-law-info")}]}}},it=et,st=Object(k["a"])(it,K,X,!1,null,null,null),nt=st.exports,at=function(){var t=this,e=t._self._c;return t.pluginStatus&&!t.tablesMissing?e("div",{class:["cky-dashboard-overview",{connected:!!t.account.connected}]},[e("div",{staticClass:"cky-row"},[e("div",{staticClass:"cky-col-12"},[e("cky-card",{attrs:{title:t.$i18n.__("Overview","cookie-law-info"),loading:t.cardLoader},scopedSlots:t._u([{key:"body",fn:function(){return[t.hasBannerErrors?e("div",{staticClass:"cky-card-row"},[e("cky-notice",{attrs:{type:t.noticeType,showIcon:!0}},[e("p",{domProps:{innerHTML:t._s(t.getBannerError())}}),e("p",{domProps:{innerHTML:t._s(t.disconnectMessage)}})])],1):t._e(),e("div",{staticClass:"cky-card-row"},[e("div",{staticClass:"cky-info-widget-container"},[e("div",{staticClass:"cky-info-widget"},[e("div",{staticClass:"cky-info-widget-icon"},[e("img",{attrs:{src:i("4a95"),alt:"layout"}})]),e("div",{staticClass:"cky-info-widget-content"},[e("span",{staticClass:"cky-info-widget-title"},[t._v(t._s(t.$i18n.__("Banner status","cookie-law-info")))]),t.bannerStatus?e("span",{staticClass:"cky-info-widget-text",staticStyle:{color:"#00aa62"}},[t._v(" "+t._s(t.$i18n.__("Active","cookie-law-info"))+" "),e("a",{staticClass:"cky-actions-link cky-button-icon",attrs:{href:t.getSiteURL(),target:"_blank"}},[e("cky-icon",{attrs:{icon:"eye"}})],1)]):e("span",{staticClass:"cky-info-widget-text cky-status-error"},[t._v(" "+t._s(t.$i18n.__("Inactive","cookie-law-info"))+" ")])])]),e("div",{staticClass:"cky-info-widget"},[e("div",{staticClass:"cky-info-widget-icon"},[e("img",{attrs:{src:i("78d0"),alt:"layout"}})]),e("div",{staticClass:"cky-info-widget-content"},[e("span",{staticClass:"cky-info-widget-title"},[t._v(t._s(t.$i18n.__("Regulation","cookie-law-info")))]),e("span",{staticClass:"cky-info-widget-text"},[t._v(" "+t._s(t.applicableLaws)+" ")])])]),e("div",{staticClass:"cky-info-widget"},[e("div",{staticClass:"cky-info-widget-icon"},[e("img",{attrs:{src:i("c3cb"),alt:"layout"}})]),e("div",{staticClass:"cky-info-widget-content"},[e("span",{staticClass:"cky-info-widget-title"},[t._v(t._s(t.$i18n.__("Language","cookie-law-info")))]),e("span",{staticClass:"cky-info-widget-text"},[t._v(" "+t._s(t.defaultLanguage.name)+" ")])])]),e("div",{staticClass:"cky-info-widget"},[e("div",{staticClass:"cky-info-widget-icon"},[e("img",{attrs:{src:i("5544"),alt:"layout"}})]),e("div",{staticClass:"cky-info-widget-content"},[e("span",{staticClass:"cky-info-widget-title"},[t._v(t._s(t.$i18n.__("Targeted location","cookie-law-info")))]),e("span",{staticClass:"cky-info-widget-text"},[t.account.connected?e("span",{staticStyle:{"font-size":"14px"}},[t._v(" "+t._s(t.capitalizeString(t.targetedLocation))+" ")]):e("span",[t._v(t._s(t.$i18n.__("Worldwide","cookie-law-info")))])])])])])])]},proxy:!0},{key:"footer",fn:function(){return[t.account.connected?e("div",{staticClass:"cky-card-row"},[e("div",{staticClass:"cky-card-row-actions"},[e("a",{staticClass:"cky-button cky-button-outline cky-external-link cky-button-medium",on:{click:function(e){return t.$router.redirectToApp("customize")}}},[t._v(t._s(t.$i18n.__("Customize Banner","cookie-law-info"))+" ")])])]):e("div",{staticClass:"cky-card-row"},[e("div",{staticClass:"cky-card-row-actions"},[e("router-link",{attrs:{to:{name:"customize"},custom:""},scopedSlots:t._u([{key:"default",fn:function({navigate:i}){return[e("a",{staticClass:"cky-button cky-button-outline cky-button-medium cky-external-link",on:{click:i}},[t._v(t._s(t.$i18n.__("Customize Banner","cookie-law-info"))+" ")])]}}],null,!1,79922652)})],1)])]},proxy:!0}],null,!1,678231962)})],1)])]):t._e()},ot=[],ct={name:"CkyDashboardOverview",components:{CkyCard:r["a"],CkyNotice:m["a"],CkyIcon:u["a"]},data(){return{noticeType:"error",subscriptionURL:window.ckyGlobals.webApp.url+"/settings/subscriptions",disconnectMessage:this.$i18n.sprintf(this.$i18n.__('Alternatively, you can <a href="%s">disconnect</a> your site from the web app and continue using the standalone version of the plugin. Please note that by doing so, you will lose your banner customization and access to advanced features.',"cookie-law-info"),"admin.php?page=cookie-law-info#/settings")}},methods:{getSiteURL(){const t=new URL(window.ckyGlobals.site.url);return t.searchParams.append("cky_preview",!0),t.toString()},getBannerError(){return!(!this.info.website||!this.connected)&&("suspended"!==this.info.website.status||this.info.website.payment_status?"suspended"===this.info.website.status&&this.info.website.is_trial&&!this.info.website.is_trial_with_card?this.bannerErrors.trailEnds:!!this.info.pageviews.exceeded&&("banner_disabled"===this.info.status?this.bannerErrors.pageviewsExceeded:(this.noticeType="warning",this.bannerErrors.pageviewsWarning)):this.bannerErrors.suspended)},capitalizeString(t){return t.charAt(0).toUpperCase()+t.slice(1)}},computed:{...Object(B["c"])("languages",{defaultLanguage:"getDefault"}),...Object(B["d"])("settings",["info"]),cardLoader(){return!this.info||this.loading},banner(){return this.$store.state.banners.current},consentLogs(){return this.getInfo("consent_logs")&&this.getInfo("consent_logs").status||!1},account(){return this.getOption("account")},connected(){return!!this.account.connected},applicableLaws(){if(this.account.connected){const t=this.getInfo("banners");if(t.laws){const e=t.laws.split(/\s*&\s*/);return"ccpa"===t.laws?"US State Laws":e.includes("ccpa")&&e.includes("gdpr")?t.is_iab_enabled?"GDPR (IAB TCF v2.2) & US State Laws":"GDPR & US State Laws":t.is_iab_enabled?"GDPR (IAB TCF v2.2)":"GDPR"}return"GDPR"}{const t=this.banner?this.banner.properties.settings.applicableLaw:"";return"gdpr"===t?"GDPR":"US State Laws"}},targetedLocation(){if(this.account.connected){const t=this.getInfo("banners");if(t.targetedLocation)return t.targetedLocation}return"Worldwide"},pluginStatus(){return this.$store.state.settings.status},tablesMissing(){return!!this.info.tables_missing},bannerStatus(){return!this.info.website||!this.connected||!(this.info.pageviews&&this.info.pageviews.exceeded&&"banner_disabled"==this.info.status||"suspended"===this.info.website.status&&this.info.website.is_trial&&!this.info.website.is_trial_with_card||this.info.banner_disabled_manually)},hasBannerErrors(){return!!this.getBannerError()},gracePeriod(){return this.info&&this.info.website&&this.info.website.grace_period_ends_at?this.info.website.grace_period_ends_at:0},bannerErrors(){return{trailEnds:this.$i18n.sprintf(this.$i18n.__('Your free trial has expired. This site is now suspended and will be <b>permanently deleted</b> from your web app account if you do not upgrade to a paid plan by <b>%s</b>. Visit <a href="%s" target="_blank">Subscriptions</a> to choose a plan and activate your banner.',"cookie-law-info"),this.gracePeriod,this.subscriptionURL),suspended:this.$i18n.sprintf(this.$i18n.__('This site is currently suspended due to payment failure and will be <b>permanently deleted</b> from your web app account if you do not complete the payment by <b>%s</b>. Visit <a href="%s" target="_blank">Subscriptions</a> to choose a plan and activate your banner.',"cookie-law-info"),this.gracePeriod,this.subscriptionURL),pageviewsWarning:this.$i18n.sprintf(this.$i18n.__('<b>Pageview limit exceeded</b>: Upgrade to a higher plan to increase your pageview limit and continue displaying the banner on this site. Visit <a href="%s" target="_blank">Subscriptions</a> to upgrade plan.',"cookie-law-info"),this.subscriptionURL),pageviewsExceeded:this.$i18n.sprintf(this.$i18n.__('<b>Pageview limit exceeded</b>: Upgrade to a higher plan to increase your pageview limit and continue displaying the banner on this site. Visit <a href="%s" target="_blank">Subscriptions</a> to upgrade plan and activate your banner.',"cookie-law-info"),this.subscriptionURL)}}}},rt=ct,lt=(i("791f"),Object(k["a"])(rt,at,ot,!1,null,null,null)),dt=lt.exports,ut=i("c4aa"),pt={name:"Dashboard",mixins:[P["a"]],components:{NoticeMigration:L,CkyScanSummary:b,CkyConnectSuccess:A["a"],CkyConnectNotice:D,CkyDashboardOverview:dt,UpgradeWidget:Q,CkyFaqWidget:nt,CkyConsentChart:()=>Promise.all([i.e("chunk-6c8091d8"),i.e("chunk-b691bfd0")]).then(i.bind(null,"03b4")),CkyPageviewGraph:()=>Promise.all([i.e("chunk-6c8091d8"),i.e("chunk-61f7ebc2")]).then(i.bind(null,"fe52"))},data(){return{scanStatus:!0,loading:!0,syncing:!1}},methods:{loadBanner:async function(){await ut["a"].getActiveBanner()},connectScan(){this.connectToApp(),this.$root.$on("afterConnection",()=>{this.$refs.ckyButtonConnectScan.startLoading()})},connectLog(){this.connectToApp(),this.$root.$on("afterConnection",()=>{this.$refs.ckyButtonConnectLog.startLoading()})},getSiteURL(){const t=new URL(window.ckyGlobals.site.url);return t.searchParams.append("cky_preview",!0),t.toString()}},computed:{banner(){return this.$store.state.banners.current},consentLogs(){return this.getInfo("consent_logs")&&this.getInfo("consent_logs").status||!1},account(){return this.getOption("account")},bannerStatus(){return this.getInfo("banners")&&this.getInfo("banners").status||!1},scans(){return this.getInfo("scans")&&this.getInfo("scans")||{}},plan(){return this.getInfo("plan").name||"free"},freePlan(){return"free"===this.plan.toLowerCase()},...Object(B["c"])("languages",{defaultLanguage:"getDefault"})},async created(){this.loading=!0;try{await this.loadBanner(),this.loading=!1,this.$root.$on("beforeConnection",()=>{this.syncing=!0}),this.$root.$on("afterSyncing",()=>{this.syncing=!1})}catch(t){console.error(t)}}},yt=pt,kt=(i("51bf"),Object(k["a"])(yt,s,n,!1,null,"633559f7",null));e["default"]=kt.exports},b94f:function(t,e,i){t.exports=i.p+"img/arrow.svg"},c3cb:function(t,e,i){t.exports=i.p+"img/lang.svg"},d3d1:function(t,e,i){},d641:function(t,e,i){"use strict";i("ff9b")},e2ea:function(t,e,i){},f222:function(t,e,i){t.exports=i.p+"img/check.svg"},ff9b:function(t,e,i){}}]);