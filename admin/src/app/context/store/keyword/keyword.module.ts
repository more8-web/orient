import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./keyword.state";
import { reducer } from "./keyword.reducer";
import { KeywordEffects } from "./keyword.effects";
import { KeywordSelectors } from "./keyword.selectors";
import { KeywordDispatcher } from "./keyword.dispatcher";



@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([KeywordEffects])
  ],
    providers: [KeywordSelectors, KeywordDispatcher]
})
export class KeywordModule { }
