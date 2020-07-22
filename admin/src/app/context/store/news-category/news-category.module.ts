import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./news-category.state";
import { reducer } from "./news-category.reducer";
import { NewsCategoryEffects } from "./news-category.effects";



@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([NewsCategoryEffects])
  ]
})
export class NewsCategoryModule { }
