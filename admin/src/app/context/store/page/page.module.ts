import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./page.state";
import { reducer } from "./page.reducer";
import { PageEffects } from "./page.effects";
import { PageSelectors } from "./page.selectors";
import { PageDispatcher } from "./page.dispatcher";



@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([PageEffects])
  ],
    providers: [PageSelectors, PageDispatcher]
})
export class PageModule { }
