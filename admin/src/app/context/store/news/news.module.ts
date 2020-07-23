import { NgModule } from "@angular/core";
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { newsFeatureKey } from "./news.state";
import { reducer } from "./news.reducer";
import { NewsEffects } from "./news.effects";
import { NewsSelector } from "./news.selectors";
import { NewsDispatcher } from "./news.dispatcher";

@NgModule({
    declarations: [],
    imports: [
        StoreModule.forFeature(newsFeatureKey, reducer),
        EffectsModule.forFeature([NewsEffects])
    ],
    providers: [NewsSelector, NewsDispatcher]
})
export class NewsModule {
}
