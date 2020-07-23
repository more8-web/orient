import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./content.state";
import { reducer } from "./content.reducer";
import { ContentEffects } from "./content.effects";
import { ContentSelectors } from "./content.selectors";
import { ContentDispatcher } from "./content.dispatcher";




@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([ContentEffects])
  ],
    providers: [ContentSelectors, ContentDispatcher]
})
export class ContentModule { }
