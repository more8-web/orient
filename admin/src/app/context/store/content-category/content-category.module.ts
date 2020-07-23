import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./content-category.state";
import { reducer } from "./content-category.reducer";
import { ContentCategoryEffects } from "./content-category.effects";
import { ContentCategorySelectors } from "./content-category.selectors";
import { ContentCategoryDispatcher } from "./content-category.dispatcher";



@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([ContentCategoryEffects])
  ],
    providers: [ContentCategorySelectors, ContentCategoryDispatcher]
})
export class ContentCategoryModule { }
