import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./news-log.state";
import { reducer } from "./news-log.reducer";
import { NewsLogEffects } from "./news-log.effects";




@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([NewsLogEffects])
  ]
})
export class NewsLogModule { }
