(()=>{"use strict";const e=window.wp.blocks,t=window.wp.element,n=window.wp.blockEditor,l=window.wp.components,o=window.wc.wcSettings,c=window.wc.blocksCheckout,{newsletterText:s,smsConsentText:a,smsConsentDisclosureText:r,smsEnabled:i,newsletterEnabled:u}=(0,o.getSetting)("klaviyo_checkout_block_data"),w=({checkoutExtensionData:e={}})=>{const[n,l]=(0,t.useState)(!1),[o,w]=(0,t.useState)(!1),{setExtensionData:k}=e;return(0,t.useEffect)((()=>{k&&i&&k("klaviyo","sms",o)}),[o,k]),(0,t.useEffect)((()=>{k&&u&&k("klaviyo","newsletter",n)}),[n,k]),u||i?(0,t.createElement)(t.Fragment,null,u&&(0,t.createElement)(c.CheckboxControl,{checked:n,onChange:l},(0,t.createElement)("span",null,s)),i&&(0,t.createElement)(t.Fragment,null,(0,t.createElement)(c.CheckboxControl,{checked:o,onChange:w},(0,t.createElement)("span",null,a)),o&&(0,t.createElement)("p",null,r))):null},k=JSON.parse('{"name":"klaviyo/klaviyo-checkout-block"}');(0,e.registerBlockType)(k.name,{edit:function(){return(0,t.createElement)("div",{...(0,n.useBlockProps)()},(0,t.createElement)(l.Disabled,null,(0,t.createElement)(w,null)))},save:function(){return(0,t.createElement)("div",{...n.useBlockProps.save()})}})})();