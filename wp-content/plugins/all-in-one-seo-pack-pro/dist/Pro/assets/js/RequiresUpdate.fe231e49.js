function a({app:o,next:n,router:t,to:e}){return"Pro".toLowerCase()!=="pro"||!window.aioseo.license.isActive||!o.$addons.hasMinimumVersion(e.meta.middlewareData.addon)?(n(),t.push({name:e.meta.middlewareData.routeName}).catch(()=>{})):n()}export{a as R};