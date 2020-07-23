import { NgModule } from '@angular/core';
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./news-log.state";
import { reducer } from "./news-log.reducer";
import { NewsLogEffects } from "./news-log.effects";
import { NewsLogSelector } from "./news-log.selectors";
import { NewsLogDispatcher } from "./news-log.dispatcher";




@NgModule({
  declarations: [],
  imports: [
      StoreModule.forFeature(newsFeatureKey, reducer),
      EffectsModule.forFeature([NewsLogEffects])
  ],
    providers: [NewsLogSelector, NewsLogDispatcher]
})
export class NewsLogModule { }
